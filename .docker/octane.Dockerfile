FROM ghcr.io/roadrunner-server/roadrunner:latest AS roadrunner
FROM php:8.2-fpm

COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor \
    nginx

# Install PHP extensions
RUN docker-php-ext-install pdo mbstring exif pcntl bcmath

# Copy project files
COPY . .
COPY ./.docker/supervisord.conf /etc/supervisor/conf.d/
COPY ./.docker/nginx.conf /etc/nginx/conf.d/default.conf

RUN chown -R www-data:www-data storage
RUN chown -R www-data:www-data storage/app
RUN chmod -R 777 storage/logs

# Nginx remove default site
RUN rm /etc/nginx/sites-enabled/default

EXPOSE 80

# Start ALL
CMD ["/usr/bin/supervisord", "-n"]
