<?php

namespace App\Providers;

use App\Http\Views\MenuCategoryComposer;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        View()->composer([
            'backend.dashboard',
            'frontend.pages.home',
            'frontend.includes.children_menus',
            'frontend.pages.category-product',
            'frontend.includes.header'
        ],MenuCategoryComposer::class);
    }
}
