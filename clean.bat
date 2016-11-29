@echo off
echo ----- Deleting Junk files -----
php artisan optimize
php artisan config:cache
php artisan view:clear
php artisan route:clear
php artisan clear-compiled
composer dump-autoload -o