#!/usr/bin/env bash
set -Eeuo pipefail

# Zero-touch boot for Render / Docker Compose:
# sync theme+plugins → wait MySQL → install core → import SQL once → Apache on $PORT

SRC="/usr/src/wordpress/wp-content"
DEST="/var/www/html/wp-content"
SQL_DUMP="${WORDPRESS_SQL_DUMP:-/usr/src/database/usnews_wordpress.sql}"
PORT="${PORT:-80}"
export PORT

mkdir -p "$DEST/themes" "$DEST/plugins" "$DEST/uploads"

replace_dir() {
	local name="$1" src="$2/$1" dest="$3/$1"
	[ -d "$src" ] || return 0
	rm -rf "$dest"
	cp -a "$src" "$dest"
}

replace_dir usnews "$SRC/themes" "$DEST/themes"
replace_dir elementor "$SRC/plugins" "$DEST/plugins"
replace_dir akismet "$SRC/plugins" "$DEST/plugins"

if [ -f "$SRC/plugins/hello.php" ]; then
	cp -a "$SRC/plugins/hello.php" "$DEST/plugins/hello.php"
fi

if [ -d "$SRC/uploads" ] && [ -z "$(ls -A "$DEST/uploads" 2>/dev/null || true)" ]; then
	cp -a "$SRC/uploads/." "$DEST/uploads/"
fi

chown -R www-data:www-data "$DEST" 2>/dev/null || true

parse_db() {
	local hostport="${WORDPRESS_DB_HOST:-mysql}"
	if [[ "$hostport" == *:* ]]; then
		DB_HOST="${hostport%%:*}"
		DB_PORT="${hostport##*:}"
	else
		DB_HOST="$hostport"
		DB_PORT="${WORDPRESS_DB_PORT:-3306}"
	fi
	DB_USER="${WORDPRESS_DB_USER:-wordpress}"
	DB_PASSWORD="${WORDPRESS_DB_PASSWORD:-}"
	DB_NAME="${WORDPRESS_DB_NAME:-wordpress}"
	# WordPress PHP only reads DB_HOST (no separate port) — always export host:port
	export WORDPRESS_DB_HOST="${DB_HOST}:${DB_PORT}"
	export WORDPRESS_DB_PORT="$DB_PORT"
}

wait_for_db() {
	parse_db
	echo "Waiting for MySQL at ${DB_HOST}:${DB_PORT} (database=${DB_NAME})..."
	local i=0
	local max="${WORDPRESS_DB_WAIT_SECONDS:-60}"
	while [ "$i" -lt "$max" ]; do
		if mysqladmin ping \
			-h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" \
			--silent --connect-timeout=3 2>/dev/null; then
			echo "MySQL is ready."
			return 0
		fi
		i=$((i + 1))
		sleep 1
	done
	echo "ERROR: MySQL not reachable after ${max}s at ${DB_HOST}:${DB_PORT}" >&2
	return 1
}

table_count() {
	parse_db
	mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" \
		-N -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${DB_NAME}';" \
		2>/dev/null || echo "0"
}

update_site_url() {
	parse_db
	local url="${WORDPRESS_SITE_URL:-${RENDER_EXTERNAL_URL:-}}"
	url="${url%/}"
	[ -n "$url" ] || return 0

	local count
	count="$(table_count | tr -d '[:space:]')"
	[ -n "$count" ] && [ "$count" != "0" ] || return 0

	echo "Setting WordPress siteurl/home to ${url}"
	mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" -e \
		"UPDATE wp_options SET option_value='${url}' WHERE option_name IN ('siteurl','home');" \
		2>/dev/null || true
}

# Theme + Elementor must be active or the homepage body stays blank (header/footer only).
ensure_runtime_options() {
	parse_db
	local count
	count="$(table_count | tr -d '[:space:]')"
	[ -n "$count" ] && [ "$count" != "0" ] || return 0

	echo "Ensuring usnews theme + Elementor are active..."
	mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" -e "
		UPDATE wp_options SET option_value='usnews' WHERE option_name IN ('template','stylesheet');
		UPDATE wp_options
			SET option_value='a:2:{i:0;s:31:\"elementor/elementor.php\";i:1;s:19:\"akismet/akismet.php\";}'
			WHERE option_name='active_plugins';
		DELETE FROM wp_options WHERE option_name LIKE '%_transient_elementor%';
		DELETE FROM wp_postmeta WHERE meta_key='_elementor_css';
	" 2>/dev/null || true
}

# Reset wp admin password from WORDPRESS_ADMIN_PASSWORD (default Admin@12345).
reset_admin_password() {
	local pass="${WORDPRESS_ADMIN_PASSWORD:-Admin@12345}"
	local user="${WORDPRESS_ADMIN_USER:-admin}"
	[ -f /var/www/html/wp-load.php ] || return 0
	parse_db
	local count
	count="$(table_count | tr -d '[:space:]')"
	[ -n "$count" ] && [ "$count" != "0" ] || return 0

	echo "Resetting WordPress admin password for user '${user}'..."
	WORDPRESS_ADMIN_PASSWORD="$pass" WORDPRESS_ADMIN_USER="$user" php -d display_errors=0 -r '
		$user_login = getenv("WORDPRESS_ADMIN_USER") ?: "admin";
		$pass = getenv("WORDPRESS_ADMIN_PASSWORD") ?: "Admin@12345";
		require "/var/www/html/wp-load.php";
		$user = get_user_by("login", $user_login);
		if (!$user) {
			$user = get_user_by("id", 1);
		}
		if (!$user) {
			fwrite(STDERR, "Admin user not found\n");
			exit(1);
		}
		wp_set_password($pass, (int) $user->ID);
		update_user_meta((int) $user->ID, "default_password_nag", false);
		echo "Admin password updated for " . $user->user_login . PHP_EOL;
	' || echo "WARNING: admin password reset failed — continuing boot." >&2
}

import_sql_if_needed() {
	parse_db
	local count
	count="$(table_count | tr -d '[:space:]')"
	if [ -z "$count" ] || [ "$count" = "0" ]; then
		if [ ! -f "$SQL_DUMP" ]; then
			echo "No SQL dump at $SQL_DUMP — WP installer will run on first visit."
			return 0
		fi
		echo "Empty database — importing $SQL_DUMP ..."
		mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$SQL_DUMP"
		echo "Database import complete."
	else
		echo "Database already has ${count} tables — skipping import."
	fi
	update_site_url
	ensure_runtime_options
}

bootstrap_wordpress_files() {
	if [ -e /var/www/html/index.php ] && [ -e /var/www/html/wp-includes/version.php ]; then
		return 0
	fi

	echo "WordPress core missing in /var/www/html — copying from /usr/src/wordpress..."
	# Keep already-synced theme/plugins/uploads on the disk
	tar --create --file - --directory /usr/src/wordpress \
		--exclude='./wp-content/themes/usnews' \
		--exclude='./wp-content/plugins/elementor' \
		--exclude='./wp-content/plugins/akismet' \
		--exclude='./wp-content/uploads' \
		. \
	| tar --extract --file - --directory /var/www/html

	replace_dir usnews "$SRC/themes" "$DEST/themes"
	replace_dir elementor "$SRC/plugins" "$DEST/plugins"
	replace_dir akismet "$SRC/plugins" "$DEST/plugins"
	chown -R www-data:www-data /var/www/html 2>/dev/null || true
	echo "WordPress core copy complete."
}

ensure_wp_config() {
	if [ -e /var/www/html/wp-config.php ]; then
		return 0
	fi
	if [ ! -e /usr/src/wordpress/wp-config-docker.php ]; then
		return 0
	fi
	if [ -z "${WORDPRESS_DB_HOST:-}" ] && [ -z "${WORDPRESS_DB_NAME:-}" ]; then
		return 0
	fi
	echo "Generating wp-config.php from WORDPRESS_* environment variables..."
	cp /usr/src/wordpress/wp-config-docker.php /var/www/html/wp-config.php
	chown www-data:www-data /var/www/html/wp-config.php 2>/dev/null || true
}

configure_apache_port() {
	echo "Configuring Apache to listen on port ${PORT}"
	sed -ri "s/^Listen[[:space:]].*/Listen ${PORT}/" /etc/apache2/ports.conf
	# Port 80 stays open so Render's port scan succeeds whichever port it probes
	if [ "$PORT" != "80" ]; then
		echo "Listen 80" >> /etc/apache2/ports.conf
	fi
	# "*" (no port) makes the vhost answer on every listening port
	for conf in /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf; do
		[ -f "$conf" ] || continue
		sed -ri "s/<VirtualHost [^>]*>/<VirtualHost *>/g" "$conf"
	done
}

# Static file so platform health checks never hit WordPress canonical redirects
write_health_file() {
	printf 'ok\n' > /var/www/html/render-health.txt
	chown www-data:www-data /var/www/html/render-health.txt 2>/dev/null || true
}

DB_READY=0
if [ -n "${WORDPRESS_DB_HOST:-}" ]; then
	parse_db
	# Never abort the boot on DB problems: Apache must come up so the platform
	# sees an open port and the browser shows a WordPress error, not a 502.
	if wait_for_db; then
		DB_READY=1
	fi
fi

bootstrap_wordpress_files
ensure_wp_config
write_health_file

if [ "$DB_READY" = "1" ]; then
	import_sql_if_needed || echo "WARNING: database import/URL update failed — continuing boot." >&2
	reset_admin_password || true
fi

configure_apache_port

# Re-export normalized host:port so apache/php children inherit it
if [ -n "${WORDPRESS_DB_HOST:-}" ]; then
	parse_db
fi

exec docker-entrypoint.sh "$@"
