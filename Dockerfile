FROM yiisoftware/yii2-php:7.4-apache

# Установка расширения mysqli
RUN docker-php-ext-install mysqli