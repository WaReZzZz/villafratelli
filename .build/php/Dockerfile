FROM php:8.1-fpm-alpine3.16

MAINTAINER Yaniv AFRIAT <yaniv.afriat@gmail.com>
# fileinfo json mbstring xml tokenizer \
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apk --no-cache add curl-dev icu-dev libxml2-dev \
    && apk add --no-cache bash \
    && curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash \
    && apk add symfony-cli \
    && docker-php-ext-install pdo_mysql bcmath ctype curl dom intl

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
