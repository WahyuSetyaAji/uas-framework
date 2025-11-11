<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

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
        // Otomatis mencari file di folder custom
        Blade::component('layouts.admin.app', 'admin-app-layout');
        Blade::component('layouts.admin.guest', 'admin-guest-layout');
    }
}
