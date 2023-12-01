FROM php:8.2-apache
COPY . /var/www

COPY . /apache.conf 
WORKDIR /var/www/

EXPOSE 8080


