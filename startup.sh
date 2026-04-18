#!/bin/bash
set -e

echo "=== Azure Startup Script ==="
cd /home/site/wwwroot

# Fix nginx document root to point at Laravel's public/ folder
sed -i 's|root /home/site/wwwroot;|root /home/site/wwwroot/public;|g' /etc/nginx/sites-available/default

# Add try_files to the primary location block if not already present
# This routes all requests through Laravel's index.php front controller
if ! grep -q "try_files" /etc/nginx/sites-available/default; then
    sed -i 's|index  index.php index.html index.htm;|index  index.php index.html index.htm;\n        try_files $uri $uri/ /index.php?$query_string;|g' \
        /etc/nginx/sites-available/default
fi

nginx -t && nginx -s reload

php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Done ==="
