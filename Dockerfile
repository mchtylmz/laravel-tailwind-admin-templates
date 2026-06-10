FROM serversideup/php:8.4-fpm-nginx

COPY . /var/www/html

RUN sudo chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && sudo chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
