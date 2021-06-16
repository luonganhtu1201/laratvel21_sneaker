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
        //index
        Route::get('/', [ProductController::class, 'index'])->name('backend.product.index');
        //create
        Route::get('/create', [ProductController::class, 'create'])->name('backend.product.create');
        Route::post('/create',[ProductController::class,'store'])->name('backend.product.store');
        //edit
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('backend.product.edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('backend.product.update');
        //destroy
        Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('backend.product.destroy');
        //Show images của product
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
        //index
        Route::get('/', [CategoryController::class, 'index'])->name('backend.category.index');
        //create
        Route::get('/create', [CategoryController::class, 'create'])->name('backend.category.create');
        Route::post('/create',[CategoryController::class,'store'])->name('backend.category.store');
        //edit
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('backend.category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('backend.category.update');
        //destroy
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('backend.category.destroy');
        //category->products đã tạo
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
