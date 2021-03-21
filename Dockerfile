FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
# ARG user
# ARG uid
USER root
# Install system dependencies
RUN apt-get update && apt-get install -y git curl \ 
    libpng-dev libonig-dev libzip-dev libxml2-dev zip unzip npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
#RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1001 -d /home/deployer deployer
RUN mkdir -p /home/deployer/.composer && \
    chown -R deployer:deployer /home/deployer

# Set working directory
WORKDIR /var/www

USER deployer