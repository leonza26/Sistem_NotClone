<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\AuthEventSubscriber;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Blade::componentNamespace('App\\View\\Components\\Custom', 'custom');
         // --- AKTIFKAN RADAR KEAMANAN ---
        Event::subscribe(AuthEventSubscriber::class);
    }
}
