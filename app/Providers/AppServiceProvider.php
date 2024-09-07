<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
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
        view()->composer('layout.frontend', function ($view) {
            $view->with('categories', Category::get());
        });

        view()->composer('layout.frontend', function ($view) {
            $view->with('count',auth()->check()? Cart::where('user_id',Auth::user()->id)->sum("qty"):0);
        });
    }
}
