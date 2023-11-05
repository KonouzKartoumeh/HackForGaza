# Use the official PHP image as the base image
FROM php:7.4-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip

RUN docker-php-ext-install zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy Laravel project files to the container
COPY . .

# Install project dependencies
RUN composer install

# Expose the port if necessary (e.g., for serving the app with a web server)

# Start your Laravel application (you can use php artisan serve or a web server of your choice)

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
