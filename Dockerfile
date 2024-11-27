FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo_mysql

RUN apt-get update && apt-get install -y default-mysql-client && apt-get clean


RUN pecl install xdebug-3.0.3  && \
   docker-php-ext-enable xdebug    

COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini   

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install

RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

USER www-data
