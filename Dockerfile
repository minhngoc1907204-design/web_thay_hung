FROM php:8.2-fpm

# Cài đặt các thư viện hệ thống cần thiết
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip

# Cài đặt PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Lấy Composer mới nhất
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy code vào thư mục app
WORKDIR /var/www
COPY . .

# Cài đặt thư viện Laravel
RUN composer install --no-dev --optimize-autoloader

# Chạy lệnh khởi động
CMD php artisan serve --host=0.0.0.0 --port=$PORT