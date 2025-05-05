# Gunakan image PHP dengan Apache
FROM php:8.0-apache

# Install dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd && \
    docker-php-ext-install pdo pdo_mysql && \
    a2enmod rewrite

# Salin file aplikasi ke dalam container
COPY . /var/www/html/

# Set root directory untuk aplikasi Laravel
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies Laravel
RUN composer install

# Salin konfigurasi virtual host Apache
COPY nginx/000-default.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80 untuk akses web
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
