FROM php:8.4-fpm-alpine

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd bcmath zip redis xdebug pdo_mysql

RUN apk add --no-cache busybox busybox-suid \
	&& echo "* * * * * php /app/artisan schedule:run > /dev/null 2>&1" >> /etc/crontabs/root

ENTRYPOINT ["crond", "-f"]
