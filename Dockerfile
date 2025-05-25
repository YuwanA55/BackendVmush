FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libzip-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]

CMD ["php-fpm"]

EXPOSE 9000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
