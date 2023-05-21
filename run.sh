#!/bin/sh

cd /app  
composer install
yes Y | php artisan migrate:fresh --force 
yes Y | php artisan db:seed --class=temp_seed --force 
yes Y | php artisan serve --host=0.0.0.0 --port=8000