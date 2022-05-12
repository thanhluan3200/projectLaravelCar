FROM php:7.4-fpm as base
WORKDIR /var/www/html
#Install extensions
# Install dependencies
FROM php:7.4-fpm as base
WORKDIR /var/www/html

FROM base as dev 
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
    
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs 


# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY ./src .

EXPOSE 9000
CMD ["php-fpm"]
