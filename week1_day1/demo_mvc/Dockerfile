
FROM php:8.3.30-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Thay đổi cấu hình mặc định của Apache để dùng đường dẫn mới
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài đặt PDO, MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Cài đặt và bật Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug