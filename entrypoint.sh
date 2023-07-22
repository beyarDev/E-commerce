#!/bin/ash

composer install
npm install
echo "building the project assets"
npm run build
php artisan key:generate
php artisan migrate --seed
chmod o+w ./storage/ -R