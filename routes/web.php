<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('backend.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('backend.product.create');
        Route::get('/product/{id}/images',[ProductController::class,'showImages'])->name('backend.product.images');
     });
    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        // index
        Route::get('/', [UserController::class, 'index'])->name('backend.user.index');
        // crete
        Route::get('/create', [UserController::class, 'create'])->name('backend.user.create');
        Route::post('/create', [UserController::class, 'store'])->name('backend.user.store');
        // edit
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('backend.user.edit');
        Route::post('/update/{id}',[UserController::class,'update'])->name('backend.user.update');
        //destroy
        Route::get('/delete/{id}',[UserController::class,'destroy'])->name('backend.user.destroy');
        //user->products đã tạo
        Route::get('/user/{user_id}/products',[UserController::class,'showProducts'])->name('backend.user.products');
    });
    //Quản lý danh mục
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('backend.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('backend.category.create');
        Route::get('/category/{category_id}/products',[CategoryController::class, 'showProducts'])->name('backend.category.products');
    });
    //Quản lý order
    Route::group(['prefix'=>'orders'],function(){
        Route::get('/',[OrderController::class,'index'])->name('backend.orders.index');
        Route::get('/{id}/products',[OrderController::class,'showProducts'])->name('backend.orders.products');
    });
});

//
Route::group([
    'namespace'=>'Frontend',
    'prefix'=>'client'
],function(){
    Route::get('/',[HomeController::class,'index'])->name('client.home');
    Route::get('/show/{id}',[HomeController::class,'showImages'])->name('productimg.home');
    Route::get('/register',[RegisterController::class,'showForm'])->name('user.register.form');
    Route::post('/register', [RegisterController::class,'register'])->name('user.register.store');
});
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Login
    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('admin/login', 'Auth\LoginController@login')->name('login.store');
    Route::get('admin/logout', 'Auth\LogoutController@logout')->name('logout');

    //Register
    Route::get('admin/register', 'Auth\RegisterController@showForm')->name('register.form');
    Route::post('admin/register', 'Auth\RegisterController@register')->name('register.store');
