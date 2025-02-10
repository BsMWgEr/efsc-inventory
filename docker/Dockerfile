# Use an official PHP + Apache base image
FROM php:8.1-apache

# Enable Apache mod_rewrite (if needed)
RUN a2enmod rewrite

# Install additional PHP extensions (like MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy the application files into the container
COPY ../src /var/www/html/

# Expose the port Apache runs on
EXPOSE 80
