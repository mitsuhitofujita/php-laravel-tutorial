# php-laravel-tutorial

```sh
mkdir 01-new-project
cd 01-new-project
composer create-project laravel/laravel .
php artisan serve --host=0.0.0.0 --port=8000
```

```
config('database.default');
config('database.connections.mysql');
DB::select('select 1');
```

```
composer require laravel/breeze --dev
php artisan breeze:install vue
php artisan serve
```
