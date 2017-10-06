FROM php:7.1-cli

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

WORKDIR /app
