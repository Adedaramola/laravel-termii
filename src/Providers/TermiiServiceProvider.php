<?php

declare(strict_types=1);

namespace Adedaramola\Termii\Providers;

use Adedaramola\Termii\Contracts\TermiiClientContract;
use Adedaramola\Termii\Http\TermiiClient;
use Illuminate\Support\ServiceProvider;

class TermiiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__.'/../../config/services.php',
            key: 'services',
        );
    }
    
    public function register(): void
    {
        $this->app->singleton(
            abstract: TermiiClientContract::class,
            concrete: fn (): TermiiClientContract => new TermiiClient(
                url: (string) config('services.termii.url'),
                apiKey: (string) config('services.termii.api_key'),
            ),
        );
    }
}