<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        // Pass logged username to all views.
        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $view->with('currentUser', Auth::user()->name);
            }else {
                $view->with('currentUser', null);
            }
        }); 
    }
}
