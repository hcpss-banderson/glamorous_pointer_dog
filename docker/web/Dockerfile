FROM php:apache

COPY ./app /var/www/html

COPY docker/web/entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["apache2-foreground"]
