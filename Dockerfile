FROM php:8.2-apache

# Install necessary packages
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    wget \
    mysql-client

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set up working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY . /var/www/html/

# Expose the web server port
EXPOSE 80
