FROM php:8.3-apache

# Extensao usada pelas classes DAO para acessar o MySQL do Railway.
RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

WORKDIR /var/www/html
COPY . /var/www/html

# A aplicacao tem o front controller dentro de App/.
ENV APACHE_DOCUMENT_ROOT=/var/www/html/App

RUN apt-get update && apt-get install -y curl \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Railway fornece PORT em runtime. O Apache precisa escutar exatamente nela.
CMD ["sh", "-c", "npm run migrate && php -S 0.0.0.0:${PORT:-8080} -t App"]
