FROM php:apache
RUN apt-get update && apt-get install -y \
  apt-utils \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
  libpq-dev \
  apache2-utils \
	&& pecl install xdebug |grep -Ho 'zend_ex.*\.so' |cut -d":" -f2 | xargs --replace=I echo I >/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.mode=develop,debug,profile >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.client_port=9003 >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.client_host=host.docker.internal >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.start_with_request=yes >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
  && echo xdebug.log=/tmp/xdebug.log >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.remote_handler=dbgp >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.discover_client_host=false >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo xdebug.idekey=PHPSTORM >>/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& docker-php-ext-enable xdebug \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install pdo pdo_mysql mysqli pgsql pdo_pgsql -j$(nproc) gd \
  && a2enmod rewrite && service apache2 restart