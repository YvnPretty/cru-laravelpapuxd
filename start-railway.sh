#!/bin/sh
set -eu
: "${APP_KEY:?Configure APP_KEY in Railway before starting}"
: "${DB_URI:?Configure DB_URI with the Railway MongoDB connection}"
APP_PORT=${PORT:-8080}
case "$APP_PORT" in
    ''|*[!0-9]*) echo 'PORT must be numeric' >&2; exit 1 ;;
esac
sed -ri "s/^Listen [0-9]+/Listen ${APP_PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${APP_PORT}>/" /etc/apache2/sites-available/000-default.conf
php artisan config:cache
php artisan view:cache
chown -R www-data:www-data storage bootstrap/cache
exec apache2-foreground
