# Install
```$xslt
composer require cuatao/laravel-html-caching
```

# Register as route middleware
```php
// within app/Http/Kernel.php

protected $routeMiddleware = [
    //
    \Cuatao\LaravelHtmlCaching\Http\Middleware\ResponseHtmlCachingBeforeMiddleware::class,
    \Cuatao\LaravelHtmlCaching\Http\Middleware\ResponseHtmlCachingAfterMiddleware::class,
    //
];
```

# Apply HTML response cache to routes
```php
// within routes/web.php

Route::get('/', function () {
    return view('welcome');
})->middleware('web');
```