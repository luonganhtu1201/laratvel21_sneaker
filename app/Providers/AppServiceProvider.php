<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
//        if (!Cache::has('categories')){
//            $cat = Category::all();
//            Cache::put('categories',$cat,60);
//        }
//        $catee = Cache::get('categories');
//        $catee = Cache::remember('categories',60,function(){
//            return Category::all();
//        });
//        \Illuminate\Support\Facades\View::share('categories',$catee);
    }
}
