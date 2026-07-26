# Custom WordPress image with the usnews theme + Elementor
FROM wordpress:6.7-apache

# Bundle custom content into the image source tree. The official entrypoint
# copies /usr/src/wordpress into /var/www/html when the Render disk is empty.
COPY wp-content/themes/usnews /usr/src/wordpress/wp-content/themes/usnews
COPY wp-content/plugins/elementor /usr/src/wordpress/wp-content/plugins/elementor
COPY wp-content/plugins/akismet /usr/src/wordpress/wp-content/plugins/akismet
COPY wp-content/plugins/hello.php /usr/src/wordpress/wp-content/plugins/hello.php
COPY wp-content/uploads /usr/src/wordpress/wp-content/uploads

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh \
	&& chown -R www-data:www-data /usr/src/wordpress/wp-content

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
