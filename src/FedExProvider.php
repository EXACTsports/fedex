<?php

namespace EXACTSports\FedEx;

use Illuminate\Support\ServiceProvider;

class FedExProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fedex');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/fedex'),
        ], 'public');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fedex.php', 'fedex');
    }
}
