#!/bin/sh

cd /app  
composer install
php artisan migrate:fresh --force
php artisan db:seed --class=temp_seed --force
php artisan serve --host=0.0.0.0 --port=8000