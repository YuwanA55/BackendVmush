# Gunakan image PHP 8.1 dengan FPM
FROM php:8.1-fpm

# Install ekstensi PHP yang dibutuhkan oleh Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Copy aplikasi Laravel ke dalam container
COPY . /var/www/html

# Set direktori kerja
WORKDIR /var/www/html

# Install Composer untuk Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependensi Laravel
RUN composer install

# Set izin untuk Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 untuk Nginx
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
