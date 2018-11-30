FROM webdevops/php-apache:7.1

LABEL maintainer="warmiak"

WORKDIR /app

RUN apt-get update && apt-get install -y vim tmux \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng-dev \
		ca-certificates \
		curl \
		pgp \
	&& pecl install xdebug-2.5.1  \
	&& docker-php-ext-enable xdebug \
    && a2enmod rewrite

COPY app /app

COPY .docker/php/php.ini /opt/docker/etc/php/php.ini
# COPY .docker/apache/vhost.conf /opt/docker/etc/httpd/vhost.common.d/000-default.conf

RUN adduser www-data application
