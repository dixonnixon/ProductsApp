FROM php:7.4-apache
COPY src/ /var/www/html
RUN apt-get update \
 && a2enmod rewrite \
 && docker-php-ext-install pdo pdo_mysql
# RUN docker-php-ext-install mysql pdo pdo_mysql
EXPOSE 80
# RUN docker-php-source extract \