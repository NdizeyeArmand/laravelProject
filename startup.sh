#!/bin/bash
set -e

echo "=== Azure Startup Script ==="

cd /home/site/wwwroot

# Fix document root — point Apache at Laravel's public/ folder
cat > /etc/apache2/sites-available/000-default.conf << 'APACHECONF'
<VirtualHost *:80>
    DocumentRoot /home/site/wwwroot/public

    <Directory /home/site/wwwroot/public>
        AllowOverride All
        Options -Indexes +FollowSymLinks
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
APACHECONF

# Enable mod_rewrite (needed for Laravel routing)
a2enmod rewrite

# Run Laravel setup
php artisan config:clear
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Startup complete, handing off to Apache ==="

# Start Apache as the main process
apache2-foreground
