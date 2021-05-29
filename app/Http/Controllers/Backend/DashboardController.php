<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        
        // $user = User::find(1);
        // $userInfo = $user->userInfo;
        // dd($userInfo);
        // $products = Product::paginate(2);
        $products = Product::simplePaginate(2);
        return view('backend.dashboard',[
            'products'=>$products
        ]);


        // Phương thức save
        // $product = Product::find(1);
        // $category = Category::find(3);

        // $productSaved = $category->products()->save($product);


        // Phương Thức create 
        // $category = Category::find(1);

        // $product = $category->products()->create([
        //             'name' => 'san pham create',
        //             'slug'=>'aaaa',
        //             'size'=>35,
        //             'inventory_number'=>200000,
        //             'products_sold'=>190000,
        //             'origin_price' => '10000',
        //             'sale_price' => '5000',
        //             'content' => 'Noi dung demo',
        //             'user_id' => 1
        // ]);


        // // Liên kết nhiều nhiều 
        // $order = new Order();
        // $order->total = 120500;
        // $order->save();
        // $attach = $order->products()->attach([3,4]);

        // $order = Order::find(1);
        // $products = $order->products;
        // foreach ($products as $product) {
        //     echo $product->name;
        // }

    }
}
