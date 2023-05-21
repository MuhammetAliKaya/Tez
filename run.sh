#!/bin/sh

cd /app  
composer install
php artisan migrate:fresh 
php artisan db:seed --class=temp_seed
php artisan serve --host=0.0.0.0 --port=8000