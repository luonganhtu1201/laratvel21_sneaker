<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Comment::class => CommentPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-product', function ($user, $product){
            return $user->id == $product->user_id;
        });
        Gate::define('delete-product', function ($user, $product){
            if ($user->id == $product->user_id || $user->role == User::ADMIN){
                return true;
            }else{
                return false;
            }

        });
        Gate::define('store-product',function($user,$product){
            if ($user->id == $product->user_id && $user->role == User::ADMIN){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('role-check',function ($user,$userRole){
            if ($user->role != $userRole->role && $user->role == User::ADMIN || $user->role == User::SPADMIN){
                return true;
            }else{
                return false;
            }
        });
    }
}
