FROM php:8.3
WORKDIR /app
VOLUME /app

RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug 
RUN docker-php-ext-enable xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'edb40769019ccf227279e3bdd1f5b2e9950eb000c3233ee85148944e555d97be3ea4f40c3c2fe73b22f875385f6a5155') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN mv composer.phar /root/
RUN php -r "unlink('composer-setup.php');"
RUN apt update
RUN apt install -y nano
RUN apt-get update && apt-get install -y cron
RUN alias composer=/root/composer.phar
COPY php_config.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN apt install git -y
RUN cp /root/composer.phar /usr/bin/composer
RUN composer require danharper/jsonx

# docker build -t credy .
# echo "alias credy_bash='docker run -it --rm -v $(pwd):/app --entrypoint /bin/bash credy'"
