#!/bin/sh
echo "This is script install eslint, install PHP check convetion"
pwd

composer install
php artisan key:generate

# Install eslint
echo "Starting install eslint"
npm --version
npm install


# Install code php_codesniffer
composer global require "squizlabs/php_codesniffer=*"
composer global config bin-dir --absolute
export PATH="/root/.composer/vendor/bin:$PATH"
source ~/.bashrc

# Install code php_codesnifer Framgia
cd ~/.composer/vendor/squizlabs/php_codesniffer/src/Standards
git clone https://github.com/wataridori/framgia-php-codesniffer FramgiaPHPCS
phpcs --config-set installed_paths ~/.composer/vendor/squizlabs/php_codesniffer/src/Standards/FramgiaPHPCS


php-fpm # Phai co cai nay neu ko nginx ko nhan
