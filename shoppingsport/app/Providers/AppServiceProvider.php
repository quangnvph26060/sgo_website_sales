<?php

namespace App\Providers;

use App\Models\Categoris;
use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $config = Config::first();
            $view->with([
                'categories' => Categoris::with('children')->whereNull('parent_id')->get(),
                'config' => $config
            ]);
        });
    }
}
