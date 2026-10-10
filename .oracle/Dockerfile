FROM php:5.6-cli
# Legacy oracle: era runtime + ionCube loader (templates decrypt at runtime via
# the patched Smarty resource calling ioncube_read_file()).
COPY .oracle/ioncube_loader_lin_5.6.so /usr/local/lib/php/ioncube_loader_lin_5.6.so
WORKDIR /var/www/html
CMD ["php", "-d", "zend_extension=/usr/local/lib/php/ioncube_loader_lin_5.6.so", "-d", "date.timezone=UTC", "-S", "0.0.0.0:8080", "router.php"]
