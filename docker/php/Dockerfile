FROM digbang/php-dev:7.4

RUN apt-get update && apt-get install -y libxml2-dev libicu-dev locales locales-all
RUN docker-php-ext-configure intl
RUN docker-php-ext-install -j$(nproc) soap intl bcmath

RUN mkdir /var && chown -R www-data:www-data /var && ln -s /var /var/www/html/var
