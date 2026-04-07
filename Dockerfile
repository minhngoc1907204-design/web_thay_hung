FROM bitnami/laravel:10
COPY . /app
RUN composer install