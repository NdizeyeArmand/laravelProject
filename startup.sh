#!/bin/bash
set -e

echo "=== Azure Startup Script ==="
cd /home/site/wwwroot

cat > /etc/nginx/sites-available/default << 'EOF'
server {
    listen 8080;
    server_name _;

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

    location ~ /\.ht {
        deny all;
    }
}
EOF

nginx -t && nginx -s reload

php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Done ==="
