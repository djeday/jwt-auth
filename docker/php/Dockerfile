FROM php:8.0-fpm-alpine
WORKDIR /app
RUN apk add --no-cache $PHPIZE_DEPS libzip-dev libpng-dev libxml2-dev zip unzip curl composer yarn
RUN docker-php-ext-install pdo_mysql zip pcntl exif bcmath gd
