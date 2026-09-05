FROM php:8.3-apache

# Enable mysqli extension (needed for your DB connection code)
RUN docker-php-ext-install mysqli

# Copy project files into Apache's web root
COPY . /var/www/html/

# Render expects the app to listen on port 10000 by default
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 10000

CMD ["apache2-foreground"]