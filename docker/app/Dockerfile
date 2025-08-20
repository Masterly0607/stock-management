FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    git curl zip unzip libzip-dev oniguruma-dev icu-dev mariadb-client bash

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql intl zip opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/99-custom.ini

WORKDIR /var/www/html
