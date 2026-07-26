#!/usr/bin/env bash
set -Eeuo pipefail

# Sync bundled theme/plugins into the Render disk *before* the official
# entrypoint runs. On first boot, docker-entrypoint.sh (with apache2*) will
# still copy core from /usr/src/wordpress and build wp-config.php from
# WORDPRESS_* env vars, while preserving existing wp-content paths.
# On redeploy, core is already present so only these overlays refresh.
#
# Note: do not call docker-ensure-installed.sh — it is only available in
# newer official images and is not present on wordpress:6.7-apache.

SRC="/usr/src/wordpress/wp-content"
DEST="/var/www/html/wp-content"

mkdir -p "$DEST/themes" "$DEST/plugins" "$DEST/uploads"

replace_dir() {
	local name="$1" src="$2/$1" dest="$3/$1"
	[ -d "$src" ] || return 0
	rm -rf "$dest"
	cp -a "$src" "$dest"
}

# Redeploying must update bundled code without touching disk-persisted media
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

exec docker-entrypoint.sh "$@"
