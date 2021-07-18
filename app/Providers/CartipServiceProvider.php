<?php

namespace App\Providers;

use App\Http\views\CartImportComposer;
use Illuminate\Support\ServiceProvider;

class CartipServiceProvider extends ServiceProvider
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
            'backend.includes.navbar','backend.includes.sidebar','backend.carts.index'
        ],CartImportComposer::class);
    }
}
