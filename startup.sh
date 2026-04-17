#!/bin/bash
set -e

echo "=== Azure Startup Script ==="

cd /home/site/wwwroot

# Fix document root — point nginx at Laravel's public/ folder
cat > /etc/nginx/sites-available/default << 'NGINXCONF'
server {
    listen 8080;
    root /home/site/wwwroot/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
NGINXCONF

echo "=== Nginx config written ==="

# Run Laravel setup
php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Startup complete ==="
