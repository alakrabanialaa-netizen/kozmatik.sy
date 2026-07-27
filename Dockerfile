FROM php:8.4-fpm

# Install system dependencies & PostgreSQL libraries
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nginx

# Install PHP extensions including PostgreSQL driver
RUN docker-php-ext-install pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 80

# Run migrations automatically and start the server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=80