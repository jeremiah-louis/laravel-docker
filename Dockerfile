FROM php:8.3.14-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql
