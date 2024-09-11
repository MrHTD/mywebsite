#Base image
FROM php:8.1-apache

#Install musqli
RUN docker-php-ext-install mysqli
