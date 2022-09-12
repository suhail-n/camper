FROM php:8.1.6-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS 'https://getcomposer.org/installer' | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
VOLUME [ "/var/www/vendor" ]
ADD ./src .
RUN composer install
# run dump-autoload -o to create class maps to optimize dependency autoloading in production
# RUN composer dump-autoload -o
