<?php

namespace Tuna976\PWA;

use Illuminate\Support\ServiceProvider;

class CustomCalendarServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // ✅ Load Views (Ensure directory path is correct)
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pwa');

        // ✅ Load Routes (Remove runningInConsole check)
        if (! $this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        }

        // ✅ Publish Config (Ensure correct path)
        // $this->publishes([
        //     __DIR__.'/Config/customcalendar.php' => config_path('customcalendar.php'),
        // ], 'config');

    }

    public function register()
    {
        // ✅ Bind Calendar Service
        $this->app->singleton('PWA', function ($app) {
            return new PWA();
        });
    }

}