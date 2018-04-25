FROM php:7.0-fpm

# Install extensions
RUN requirements="libmcrypt-dev g++ libicu-dev libfreetype6-dev libjpeg62-turbo-dev libpng12-dev libsqlite3-dev libssl-dev libcurl3-dev libxml2-dev libzzip-dev" \
  && apt-get update && apt-get install -y $requirements && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install mcrypt \
  && docker-php-ext-install mbstring \
  && docker-php-ext-install iconv \
  && docker-php-ext-install json \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install pdo_sqlite \
  && docker-php-ext-install phar \
  && docker-php-ext-install curl \
  && docker-php-ext-install ftp \
  && docker-php-ext-install hash \
  && docker-php-ext-install session \
  && docker-php-ext-install simplexml \
  && docker-php-ext-install tokenizer \
  && docker-php-ext-install xml \
  && docker-php-ext-install xmlrpc \
  && docker-php-ext-install zip \
  && docker-php-ext-install intl \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install gd

# Enable extensions
# RUN docker-php-ext-enable mysqli

# Add custom settings
# RUN touch /usr/local/etc/php/conf.d/custom_settings.ini \
#     && echo "display_errors = Off" >> /usr/local/etc/php/conf.d/custom_settings.ini \
#     && echo "expose_php = Off" >> /usr/local/etc/php/conf.d/custom_settings.ini \
#     && echo "upload_max_filesize = 32M" >> /usr/local/etc/php/conf.d/custom_settings.ini \
#     && echo "post_max_size = 32M" >> /usr/local/etc/php/conf.d/custom_settings.ini \
#     && echo "date.timezone = "America/Montreal"" >> /usr/local/etc/php/conf.d/custom_settings.ini \
