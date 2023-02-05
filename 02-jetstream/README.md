
```
mkdir 02-jetstream
cd 02-jetstream
composer create-project laravel/laravel .
composer require laravel/jetstream
php artisan jetstream:install inertia
npm install
npm run build
php artisan migrate
php artisan serve
```


```
$params = ['payload' => 'new-post'];
$request = \App\Http\Requests\Post\PostCreateRequest::create('/post/store', 'PUT', $params);
$controller = app()->make(\App\Http\Controllers\Post\PostController::class);
app()->call([$controller, 'store'], ['request' => $request]);
```

