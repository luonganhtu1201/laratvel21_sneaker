<?php

namespace App\Providers;

use App\Http\views\CartProductComposer;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'frontend.includes.header',
            'frontend.layouts.master',
            'frontend.pages.home',
            'frontend.pages.cart',
            'frontend.pages.category-product',
            'frontend.pages.profile',
            'frontend.pages.single-product',
            'frontend.pages.statusCart',

        ],CartProductComposer::class);
    }
}
