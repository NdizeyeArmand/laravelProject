#!/bin/bash
set -e

echo "=== Azure Startup Script ==="
cd /home/site/wwwroot

php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Done ==="
