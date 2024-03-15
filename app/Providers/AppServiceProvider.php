<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PhpParser\Builder;

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
        \Yajra\DataTables\Html\Builder::useVite();
    }
}
