FROM php:8.2-apache

# Install system dependencies and PHP extensions
# mysqli is required for login.php, pdo_mysql for config.php
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source code to match the path in config.php ($projectFolder)
COPY . /var/www/html/UDM_webreboot/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/UDM_webreboot