FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libssl-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install MongoDB extension
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update

# Set working directory
WORKDIR /var/www/html

COPY . .

RUN composer install
