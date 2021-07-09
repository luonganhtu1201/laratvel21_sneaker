<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request){
        //Session
//        $request->session()->put('user_login',1);
//        session(['session_test'=>'Luong Anh Tu']);
//        dd($request->session()->get('user_login'));
//        dd($request->session()->get('user_login'));


//        $request->session()->put('user_id','Tu');
//         dd($request->session()->get('user_id'));
//        session(['user_name'=>'Tu']);
//        dd($request->session()->get('user_name'));

//        $cart = [
//          '1' =>[
//              'id' => 1,
//              'name' => 'Ice Phone',
//              'price' => 11111,
//              'qty' => 1
//          ]
//        ];
//        session(['cart' => $cart]);

//        if ($request->session()->has('cart')){
//            $cart = session('cart');
//            $product = [
//
//                    'id' => 2,
//                    'name' => 'Ice Phone',
//                    'price' => 11111,
//                    'qty' => 1
//
//            ];
//            $cart[2] = $product;
//            $request->session()->put('cart',$cart);
//            dd($request->session()->get('cart'));
//        }else{
//            $cart = [
//                '1' =>[
//                    'id' => 1,
//                    'name' => 'Ice Phone',
//                    'price' => 11111,
//                    'qty' => 1
//                ]
//            ];
//            session(['cart' => $cart]);
//            dd($request->session()->get('cart'));
//        }

        //End Session

        //Cookie
//        Cookie::queue('username', 'Luong Anh Tu', 1);
//        Cookie::queue('userid', '123', 1);
//        dd(Cookie::get('userid'));
        //endCokie



        // $user = User::find(1);
        // $userInfo = $user->userInfo;
        // dd($userInfo);
        // $products = Product::paginate(2);

//        --------------Start Storage-------------
//        dd(storage_path('app'));
//        Storage::disk('local_2')->put('file.txt', 'Contents');
//        Storage::disk('local')->put('file.txt', 'Contents');
//        Storage::put('file1.txt','Tu');
//        Storage::disk('public')->put('file3.txt','public');
//        dd(1);
//            $disk = Storage::disk('public');
//            $path = 'file.txt';
//            if ($disk->exists($path)){
//                $content = $disk->get($path);
//                dd($content);
//            }else{
//                dd('Không tồn tại');
//            };
//            --------------End Storage----------
        $viewer = DB::table('warehouses')->select(DB::raw("SUM(import_goods) as count"))

            ->orderBy("created_at")

            ->groupBy(DB::raw("year(created_at)"))

            ->get()->toArray();

        $viewer = array_column($viewer, 'count');



        $click = DB::table('warehouses')->select(DB::raw("SUM(sold_goods) as count"))

            ->orderBy("created_at")

            ->groupBy(DB::raw("year(created_at)"))

            ->get()->toArray();

        $click = array_column($click, 'count');
        $user = count(User::all());
        $product = count(Product::all());
        $products = Product::simplePaginate(2);
        $sumOrder = DB::table('warehouses')->where('product_id',62)->sum('sold_goods');
        $pri = Product::where('id',62)->first()->sale_price;
        $su = $sumOrder*$pri;
//        dd($su);
//        dd($clickz);
        return view('backend.dashboard',[
            'products'=>$products,
            'countUser'=>$user,
            'countProduct' => $product,
            'sumOrder' => $sumOrder
        ])->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))

            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));


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
    public function chartjs(){
        $viewer = DB::table('warehouses')->select(DB::raw("SUM(import_goods) as count"))

            ->orderBy("created_at")

            ->groupBy(DB::raw("year(created_at)"))

            ->get()->toArray();

        $viewer = array_column($viewer, 'count');



        $click = DB::table('warehouses')->select(DB::raw("SUM(sold_goods) as count"))

            ->orderBy("created_at")

            ->groupBy(DB::raw("year(created_at)"))

            ->get()->toArray();

        $click = array_column($click, 'count');


        $user = count(User::all());
        $product = count(Product::all());
        $products = Product::simplePaginate(2);
        return view('backend.dashboard',[
            'products'=>$products,
            'countUser'=>$user,
            'countProduct' => $product
        ])

            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))

            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
    }
}
