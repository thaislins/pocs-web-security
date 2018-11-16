FROM php:7.2-apache

# Apache Configuration
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod expires
