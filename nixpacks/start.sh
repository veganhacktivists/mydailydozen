#!/bin/bash

set -euo pipefail

# Run Laravel migrations
php artisan migrate --force

# Create a public symlink to the storage directory
php artisan storage:link

# Transform the nginx configuration
node /assets/scripts/prestart.mjs ./nixpacks/nginx.template.conf /etc/nginx.conf

# Start PHP-FPM
php-fpm -y ./nixpacks/php-fpm.conf

# Start Supervisor
supervisord -c /etc/supervisord.conf

# Start Nginx
nginx -c /etc/nginx.conf
