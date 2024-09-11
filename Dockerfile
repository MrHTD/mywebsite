FROM php:7.2-apache
COPY . /var/www/html/
WORKDIR /var/www/html/
CMD [ "php", "-S 0.0.0.0:80", "./index.php" ]
