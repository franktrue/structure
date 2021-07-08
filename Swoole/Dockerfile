FROM phpswoole/swoole

RUN docker-php-ext-install mysqli pdo_mysql

RUN set -ex \
    && pecl update-channels \
    && pecl install redis-stable \
    && docker-php-ext-enable redis
