cd /var/www/html/grutto
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
