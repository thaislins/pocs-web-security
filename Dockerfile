FROM php:7.2-apache

# Apache Configuration
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod expires

# Install and activate mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Restart apache
RUN apachectl restart