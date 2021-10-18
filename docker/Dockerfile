FROM php:8.0-cli

# install debian packages
RUN apt-get update \
    && apt-get install -y \
        curl wget git zip unzip less vim procps lsof tcpdump htop openssl net-tools iputils-ping \
        libz-dev \
        libssl-dev \
        libnghttp2-dev \
        libpcre3-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libonig-dev \
        libzip-dev \
    && rm -rf /var/lib/apt/lists/* \

# Install PHP extensions
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install sockets
RUN docker-php-ext-install zip
RUN docker-php-ext-install sysvmsg
RUN docker-php-ext-install sysvsem
RUN docker-php-ext-install sysvshm

# install redis extension
RUN pecl install redis
RUN docker-php-ext-enable redis

# install swoole
RUN pecl install swoole
RUN docker-php-ext-enable swoole

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=bin --filename=composer
RUN rm composer-setup.php

# entrypoint
ENTRYPOINT /app/bin/swoft http:restart && sleep infinity & wait