# Custom WordPress image with the usnews theme + Elementor
FROM wordpress:6.7-apache

# mysql client: wait-for-db + first-boot SQL import
RUN apt-get update \
	&& apt-get install -y --no-install-recommends default-mysql-client \
	&& rm -rf /var/lib/apt/lists/*

# Bundle custom content into the image source tree. The official entrypoint
# copies /usr/src/wordpress into /var/www/html when the disk is empty.
COPY wp-content/themes/usnews /usr/src/wordpress/wp-content/themes/usnews
COPY wp-content/plugins/elementor /usr/src/wordpress/wp-content/plugins/elementor
COPY wp-content/plugins/akismet /usr/src/wordpress/wp-content/plugins/akismet
COPY wp-content/plugins/hello.php /usr/src/wordpress/wp-content/plugins/hello.php
COPY wp-content/uploads /usr/src/wordpress/wp-content/uploads

# First-boot database seed (imported automatically when DB has no tables)
COPY database/usnews_wordpress.sql /usr/src/database/usnews_wordpress.sql

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf \
	&& chmod +x /usr/local/bin/entrypoint.sh \
	&& chown -R www-data:www-data /usr/src/wordpress/wp-content

# Render's default web service port; docker-compose overrides this with 80
ENV PORT=10000

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
