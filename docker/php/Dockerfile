FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Установка Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
