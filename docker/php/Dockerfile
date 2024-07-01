FROM php:8.1-fpm
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && docker-php-ext-enable intl \
    && docker-php-ext-enable mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html
