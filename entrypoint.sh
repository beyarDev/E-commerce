#!/bin/ash

composer install
npm install
echo "building the project assets"
npm run build
php artisan migrate --seed
chmod o+w ./storage/ -R