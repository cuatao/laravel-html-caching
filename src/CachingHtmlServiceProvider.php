<?php

namespace Cuatao\LaravelHtmlCaching;

use Illuminate\Support\ServiceProvider;

class CachingHtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/html_caching.php' => config_path('html_caching.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/html_caching.php', 'ttl'
        );
    }
}
