# Downlaod and install docker image (if not installed), else just run the image
FROM php:7.4

# Install other dependencies
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \

      && docker-php-ext-configure gd \
      && docker-php-ext-install -j$(nproc) gd \
      && docker-php-ext-install pdo_mysql \
      && docker-php-ext-install mysqli \
      && docker-php-ext-install zip \
      && docker-php-ext-install sockets \
      && docker-php-source delete \
      && curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

# Docker container application directory
WORKDIR /app
# Copy all files from project into folder 'app' in docker container
COPY . .
# After copying all files run 'composer install; command
RUN composer install

# Run the project (host 0.0.0.0 is localhost)
CMD php artisan serve --host=0.0.0.0
EXPOSE 8000
