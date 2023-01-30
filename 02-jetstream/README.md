
```
mkdir 02-jetstream
cd 02-jetstream
composer create-project laravel/laravel .
composer require laravel/jetstream
php artisan jetstream:install inertia
npm install
npm run build
php artisan migrate
```
