FROM php:8.0.6-apache


RUN apt-get update -yqq \
    && apt-get -y install git \
    && apt-get clean

RUN docker-php-ext-install pdo_mysql mysqli 