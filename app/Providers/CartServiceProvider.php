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
            'frontend.includes.header'
        ],CartProductComposer::class);
    }
}