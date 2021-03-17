FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY app/composer.lock app/composer.json /var/www/

# Set working directory
WORKDIR /var/www/app

USER root
# Install dependencies
RUN apt-get update && apt-get install -y build-essential \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev libzip-dev libxml2-dev \
    jpegoptim optipng pngquant gifsicle \
    locales zip unzip vim git curl

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl gd \
    # Laravel-Excel extensions
    zip xml iconv simplexml

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]