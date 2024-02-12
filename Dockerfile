FROM php:8.2-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    curl
RUN  apt-get install -y libtidy-dev


RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo_mysql
RUN docker-php-ext-install pdo
RUN docker-php-ext-install exif zip 
RUN docker-php-ext-install tidy 


RUN  apt-get install -y libfreetype6-dev
RUN  apt-get install -y libtidy-dev
#RUN  apt-get install -y libwebp-dev

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]

