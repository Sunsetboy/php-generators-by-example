FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libc-client-dev libkrb5-dev \
    curl \
    wget \
    git \
    nano iputils-ping \
    mariadb-server \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxslt-dev \
    libicu-dev \
    libmcrypt-dev \
    libxml2-dev \
    libonig-dev \
    libzip-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install -j$(nproc) mbstring mysqli pdo_mysql

RUN groupadd -g 1000 -r developer && useradd -r -m -u 1000 -g developer developer

WORKDIR /var/www/async
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

USER developer

CMD ["php-fpm"]