<?php

namespace EXACTSports\FedEx;

use Illuminate\Support\ServiceProvider;

class FedExProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fedex.php', 'fedex');
    }
}
