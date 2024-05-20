FROM php:8.3-fpm
RUN apt-get update
RUN apt-get install -y libpq-dev git unzip mc nano nodejs npm telnet zlib1g-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev
RUN pecl install mongodb
RUN docker-php-ext-install pdo pgsql pdo_pgsql
RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer
RUN npm install pm2 -g
