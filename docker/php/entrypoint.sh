#!/bin/sh
set -e

# Install/update composer dependencies
if [ ! -f "/var/www/vendor/autoload.php" ] || ! php /var/www/vendor/composer/platform_check.php 2>/dev/null; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Generate app key if not set
if [ -f "/var/www/.env" ] && ! grep -q "^APP_KEY=base64:" /var/www/.env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

exec "$@"
