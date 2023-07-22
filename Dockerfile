FROM php:8.1-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
	&& apk --no-cache add postgresql-dev nodejs npm\
	&& docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html