FROM php:8.3.4-fpm

MAINTAINER info@lukashron.cz

ARG DEBIAN_FRONTEND=noninteractive

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y locales apt-utils unzip curl libonig-dev libicu-dev libxml2-dev && apt-get clean

RUN docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:1000 /var/www && usermod -u 1000 www-data
USER www-data:1000