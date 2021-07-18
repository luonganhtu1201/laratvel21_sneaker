<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ImportproController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\CartinputController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\StatisticalController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;

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
    'middleware' => ['auth','check_admin']
], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
//    Route::get('/chartjs', [DashboardController::class,'chartjs']);
    Route::post('/filter-by-date',[DashboardController::class,'filter_by_date'])->name('backend.filter.by.date');
    Route::post('/days-order',[DashboardController::class,'days_order'])->name('backend.days.order');
    Route::post('/select-filter',[DashboardController::class,'select_filter'])->name('backend.select.filter');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        //index
        Route::get('/', [ProductController::class, 'index'])->name('backend.product.index');
        //create
        Route::get('/create', [ProductController::class, 'create'])->name('backend.product.create');
        Route::post('/create',[ProductController::class,'store'])->name('backend.product.store');
        //edit
        Route::get('/edit/{product}',[ProductController::class,'edit'])->name('backend.product.edit')->middleware('can:update,product');
        Route::post('/update/{product}',[ProductController::class,'update'])->name('backend.product.update');
        //destroy
        Route::get('/delete/{product}',[ProductController::class,'destroy'])->name('backend.product.destroy');

        //Filter
        Route::get('/filter',[ProductController::class,'filter'])->name('backend.product.filter');

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
        Route::post('/update-self/{id}',[UserController::class,'update_Self'])->name('backend.user.update.self');
        //destroy
        Route::get('/delete/{id}',[UserController::class,'destroy'])->name('backend.user.destroy');
        //user->products đã tạo
        Route::get('/user/{user_id}/products',[UserController::class,'showProducts'])->name('backend.user.products');
        Route::get('/filter',[UserController::class,'filter'])->name('backend.user.filter');
        Route::get('/update-self',[UserController::class,'updateSelf'])->name('backend.update.self');
    });
    Route::group(['prefix' => 'suppliers'], function(){
        // index
        Route::get('/', [SupplierController::class, 'index'])->name('backend.supplier.index');

        // crete
        Route::get('/create', [SupplierController::class, 'create'])->name('backend.supplier.create');
        Route::post('/create', [SupplierController::class, 'store'])->name('backend.supplier.store');
        // edit
        Route::get('/edit/{id}',[SupplierController::class,'edit'])->name('backend.supplier.edit');
        Route::post('/update/{id}',[SupplierController::class,'update'])->name('backend.supplier.update');
        //destroy
        Route::get('/delete/{id}',[SupplierController::class,'destroy'])->name('backend.supplier.destroy');
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
        Route::get('/filter',[CategoryController::class,'filter'])
            ->name('backend.category.filter')
        ;
    });
    //Quản lý order
    Route::group(['prefix'=>'orders'],function(){
        Route::get('/',[OrderController::class,'index'])->name('backend.orders.index');
        Route::get('/bill/{id}',[OrderController::class,'showProducts'])->name('backend.orders.products');
        Route::get('/Cancel-Order/{id}',[OrderController::class,'cancelOrder'])->name('backend.orders.cancel');
        Route::get('/Add-cart/{id}',[OrderController::class,'addCart'])->name('backend.orders.add');
        Route::get('/No-return/{id}',[OrderController::class,'noReturn'])->name('backend.orders.noreturn');
        Route::get('/Ok-return/{id}',[OrderController::class,'okReturn'])->name('backend.orders.okreturn');
        Route::get('/ss-return/{id}',[OrderController::class,'successReturn'])->name('backend.orders.successreturn');
        Route::get('/filter',[OrderController::class,'filter'])->name('backend.order.filter');
    });
    //Quản lý comments
    Route::group(['prefix'=>'comments'],function(){
        Route::get('/',[CommentController::class,'index'])->name('backend.comments');
        Route::get('/delete/{comment}',[CommentController::class,'delete'])->name('backend.comments.destroy');
        Route::get('/edit/{comment}',[CommentController::class,'edit'])->name('backend.comment.edit');
        Route::post('/update/{comment}',[CommentController::class,'store'])->name('backend.comment.store');
    });
    //Quản lý Kho
    Route::group(['prefix'=>'warehouses'],function (){
        Route::get('/',[WarehouseController::class,'index'])->name('backend.warehouse.index');
        Route::get('/edit/{id}',[WarehouseController::class,'edit'])->name('backend.warehouse.edit');
        Route::post('/update/{id}',[WarehouseController::class,'update'])->name('backend.warehouse.update');
        Route::get('/delete/{id}',[WarehouseController::class,'destroy'])->name('backend.warehouse.destroy');
        Route::get('/create/{id}',[WarehouseController::class,'create'])->name('backend.warehouse.create');
        Route::post('/create',[WarehouseController::class,'store'])->name('backend.warehouse.store');
    });
    //Trạng thái hàng :
    Route::group(['prefix'=>'imports-status'],function (){
        Route::get('/', [ImportproController::class, 'index'])->name('backend.imports.index');
        Route::get('/filter',[ImportproController::class,'filter'])->name('backend.imports.filter');
        Route::get('/on-sale/{id}',[ImportproController::class,'onSale'])->name('backend.imports.onsale');
        Route::get('/importing/{id}',[ImportproController::class,'importing'])->name('backend.imports.importing');
        Route::get('/stop-selling/{id}',[ImportproController::class,'stopSell'])->name('backend.imports.stopsell');
    });
    //Nhập hàng :
    Route::group(['prefix'=>'import-goods'],function (){
        Route::get('/',[CartinputController::class,'index'])->name('backend.cartinput.index');
        Route::post('/supp',[CartinputController::class,'supp'])->name('backend.cart.supp');
        Route::post('/add-to-ware',[CartinputController::class,'addImports'])->name('backend.add.ware');
        Route::get('/add-import/{id}',[CartinputController::class,'add'])->name('backend.import.product');
        Route::get('cart/remove/{id}', [CartinputController::class,'remove'])->name('backend.import.remove');
        Route::get('/show-imports',[CartinputController::class,'showImport'])->name('backend.show.imports');
        Route::get('/Add-ware/{id}',[CartinputController::class,'addWare'])->name('backend.import.pro');
        Route::get('/remove-import/{id}',[CartinputController::class,'removeImport'])->name('backend.ban.import');
        Route::get('/bill/{id}',[CartinputController::class,'billImport'])->name('backend.bill.import');
    });
//    Thống kê :
    Route::group(['prefix'=>'statistical'],function (){
        Route::get('/',[StatisticalController::class,'index'])->name('backend.statistical.index');
    });
});

//
Route::group([
    'namespace'=>'Frontend',

],function(){
    Route::get('/',[HomeController::class,'index'])->name('client.home');
    Route::get('/show/{id}',[HomeController::class,'showImages'])->name('productimg.home');
    Route::get('/collections',[HomeController::class,'categoryPro'])->name('client.category');
    Route::get('/collections/filter',[HomeController::class,'filter'])->name('frontend.product.filter');
    Route::post('/comment/{id}',[HomeController::class,'comment'])->name('client.comment');
    Route::get('/cart',[HomeController::class,'cart'])->name('cart.client');
    Route::get('/my-account',[HomeController::class,'profile'])->name('client.profile');
    Route::get('/forgot-password',[HomeController::class,'forgot_password'])->name('client.forgot.password');
    Route::get('/change-password',[HomeController::class,'change_passsword'])->name('client.change.password');
    Route::post('/success-new-passsword',[HomeController::class,'change_pass_success'])->name('client.change.password.success');
    Route::post('/password-retrieval',[HomeController::class,'password_retrieval'])->name('client.password.retrieval');
    Route::post('/update-profile/{id}',[HomeController::class,'update'])->name('client.profile.update');
    Route::post('/update-passwword-profile/{id}',[HomeController::class,'updatePass'])->name('profile.update.pass');
    Route::post('/quickview',[HomeController::class,'quickview'])->name('quickview');
});

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //Login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/admin/login', 'Auth\LoginController@showLoginFormAd')->name('login.form');
    Route::post('/login', 'Auth\LoginController@login')->name('login.store');
    Route::post('/admin/login', 'Auth\LoginController@login')->name('login.store.ad');
    Route::get('/admin/logout', 'Auth\LogoutController@logoutAd')->name('logout.ad');
    Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');

    //Register
    Route::get('/register', 'Auth\RegisterController@showForm')->name('user.register.form');
    Route::post('/register', 'Auth\RegisterController@register')->name('user.register.store');

    //Cart
Route::get('products/cart/list', [CartController::class,'index'])->name('frontend.cart.index');
Route::get('products/cart/add/{id}', [CartController::class,'add'])->name('frontend.cart.add');
Route::get('products/cart/remove/{id}', [CartController::class,'remove'])->name('frontend.cart.remove');
Route::get('products/cart/destroy', [CartController::class,'destroy'])->name('frontend.cart.destroy');
Route::get('products/cart/update',[CartController::class,'update'])->name('frontend.cart.update');
Route::post('product/order',[CartController::class,'addtoOrder'])->name('frontend.cart.order');
Route::get('status-order',[CartController::class,'statusCart'])->name('frontend.cart.status');
Route::get('user-cancel-order/{id}',[CartController::class,'usCancel'])->name('frontend.cart.cancel');
Route::get('user-return-order/{id}',[CartController::class,'usRepro'])->name('frontend.cart.returnpro');
