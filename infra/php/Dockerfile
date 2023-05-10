FROM php:8.1-fpm-bullseye AS base

WORKDIR /workspace

ENV TZ=UTC \
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get -y install --no-install-recommends \
    locales \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && locale-gen en_US.UTF-8 \
  && localedef -f UTF-8 -i en_US en_US.UTF-8 \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath \
  && composer config -g process-timeout 3600 \
  && composer config -g repos.packagist composer https://packagist.org

FROM base AS development

COPY ./infra/php/php.development.ini /usr/local/etc/php/php.ini

FROM development AS development-xdebug

RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

COPY ./infra/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

FROM base AS deploy

COPY ./infra/php/php.deploy.ini /usr/local/etc/php/php.ini
COPY ./src /workspace

RUN composer install -q -n --no-ansi --no-dev --no-scripts --no-progress --prefer-dist \
  && php artisan key:generate \
  && php artisan storage:link \
  && chmod -R 777 storage bootstrap/cache \
  && php artisan optimize:clear \
  && php artisan optimize \
  && php artisan migrate --seed \
  && make install \
  && rm -rf /usr/local/bin/npm /usr/local/share/man/man1/node* ~/.npm \
  && rm -rf /usr/local/lib/node* \
  && rm -rf /usr/local/bin/node* \
  && rm -rf /usr/local/include/node* \
  && apt-get purge nodejs npm \
  && apt autoremove \
  && curl -fsSL https://deb.nodesource.com/setup_19.x | bash - \
  && apt-get install -y nodejs \
  && curl -qL https://www.npmjs.com/install.sh | sh \ 

