FROM php:7.3-apache


MAINTAINER Leonel De Leon <gldeleon@live.com.mx>



#········instalar y configurar librerias basicas

RUN apt-get update

RUN apt-get install -y autoconf pkg-config libssl-dev apt-utils zlib1g

#········instalar composer

RUN cd ~

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

#········instalar y configurar librerias adicionales

RUN apt-get install -y \
libzip-dev \
zip \
&& docker-php-ext-install zip

RUN docker-php-ext-install iconv  mbstring

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

RUN docker-php-ext-install bcmath

RUN apt-get update && apt-get install -y libpng-dev

RUN apt-get install -y \
libwebp-dev \
libjpeg62-turbo-dev \
libpng-dev libxpm-dev \
libfreetype6-dev

RUN docker-php-ext-configure gd \
--with-gd \
--with-webp-dir \
--with-jpeg-dir \
--with-png-dir \
--with-zlib-dir \
--with-xpm-dir \
--with-freetype-dir

RUN docker-php-ext-install gd

#········configurar git

RUN pwd

RUN apt-get install -y git

RUN rm -r /var/www/html/*



#........configurar apache

RUN chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN service apache2 restart



#.......instalar NODE y npm

RUN apt install -y nodejs sudo npm

RUN nodejs -v

RUN npm --version



#.......instalar vue y vue cli

RUN npm install vue

RUN npm install --global vue-cli

#.......instalar mariadb

RUN apt-get -y install mariadb-server



#.......instalar NODE y npm

RUN apt-get install -y curl software-properties-common

RUN apt-get update

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

RUN apt-get install -y nodejs

RUN nodejs -v

RUN npm --version


#.......instalar express

RUN npm i express