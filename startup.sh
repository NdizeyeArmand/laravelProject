#!/bin/bash
set -e

echo "=== Azure Startup Script ==="
cd /home/site/wwwroot

# Fix nginx document root to point at Laravel's public/ folder
sed -i 's|root /home/site/wwwroot;|root /home/site/wwwroot/public;|g' /etc/nginx/sites-available/default
nginx -s reload

php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Done ==="
