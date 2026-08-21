FROM php:8.3-apache

# Extensao usada pelas classes DAO para acessar o MySQL do Railway.
RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

WORKDIR /var/www/html
COPY . /var/www/html

# A aplicacao tem o front controller dentro de App/.
ENV APACHE_DOCUMENT_ROOT=/var/www/html/App

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf \
    && printf '<Directory /var/www/html/App>\n    Options -Indexes +FollowSymLinks\n    AllowOverride All\n    Require all granted\n    FallbackResource /index.php\n</Directory>\n' \
        > /etc/apache2/conf-available/biblioteca.conf \
    && a2enconf biblioteca

# Railway fornece PORT em runtime. O Apache precisa escutar exatamente nela.
CMD ["sh", "-c", "sed -ri \"s/^Listen .*/Listen ${PORT:-8080}/\" /etc/apache2/ports.conf && sed -ri \"s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT:-8080}>/\" /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]
