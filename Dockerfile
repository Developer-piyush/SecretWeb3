FROM php:7.2-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql

RUN mkdir /app \
 && mkdir /app/www \
 && mkdir /app/www/www

COPY www/ /app/www/www/

RUN cp -r /app/www/www/* /var/www/html/.