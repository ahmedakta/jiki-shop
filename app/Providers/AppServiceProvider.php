<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        // *** Pagination Default Settings 
        Paginator::defaultView('custom-pagination');
        Paginator::defaultSimpleView('simple-pagination');

        // *** Website Informations (Configs Table)
        // Mail , social media , addresses etc....


        // *** User Basket Information
        $user = Auth::user();
        $userBasket = Session::get('cart');
        View::share('userBasket', $userBasket);
        View::share('user', $user);
    }
}
