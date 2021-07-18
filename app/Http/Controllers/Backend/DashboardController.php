<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Statistical;
use App\Models\Warehouse;
use Carbon\Carbon;
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


        $user = count(User::all());
        $product = count(Product::all());
        $products = Product::orderBy('created_at','DESC')->where('status',0)->skip(0)->take(5)->get();
        $sumOrder = count(Order::where('status',3)->get());
//        dd($sumOrder);
        $pri = Product::where('id',62)->first()->sale_price;
        $revenue = Statistical::sum('revenue');

        foreach (User::all() as $us){
            $oo[] = count($us->orders);
        }
//        dd(count(Order::where('status',-4)->get()));
        if(count(Order::all())!=0 && count(Order::where('status',3)->get())!=0){
            $query = DB::table('orders')
                ->select(array('user_id', DB::raw('sum(orders.total) as iop')))
                ->where('status', '=', 3)
                ->groupBy('user_id')
                ->orderBy('iop', 'desc')
                ->skip(0)
                ->take(5)
                ->get();
            for($i=0; $i< count($query); $i++){
                $topUser[] = User::find($query[$i]->user_id);
            }
        }else{
            $topUser = [];
        }

        $admin = User::where('role',1)->orderBy('created_at','DESC')->limit(3)->get();
//        $prooo = Product::whereHas('warehouses',function ($e){
//            $e->orderBy('sold_goods', 'DESC');
//        })->skip(0)->take(5)->get();
        $topSale = Warehouse::orderBy('sold_goods', 'DESC')->skip(0)->take(5)->get();
        return view('backend.dashboard',[
            'products'=>$products,
            'countUser'=>$user,
            'countProduct' => $product,
            'sumOrder' => $sumOrder,
            'revenue' => $revenue,
            'topUser' => $topUser,
            'admins' => $admin,
            'topSale' => $topSale,
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
//    public function chartjs(){
//        $viewer = DB::table('warehouses')->select(DB::raw("SUM(import_goods) as count"))
//
//            ->orderBy("created_at")
//
//            ->groupBy(DB::raw("year(created_at)"))
//
//            ->get()->toArray();
//
//        $viewer = array_column($viewer, 'count');
//
//
//
//        $click = DB::table('warehouses')->select(DB::raw("SUM(sold_goods) as count"))
//
//            ->orderBy("created_at")
//
//            ->groupBy(DB::raw("year(created_at)"))
//
//            ->get()->toArray();
//
//        $click = array_column($click, 'count');
//
//
//        $user = count(User::all());
//        $product = count(Product::all());
//        $products = Product::simplePaginate(2);
//        return view('backend.dashboard',[
//            'products'=>$products,
//            'countUser'=>$user,
//            'countProduct' => $product
//        ])
//
//            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
//
//            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
//    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach ($get as $key => $value){
            $char_data[] = array(
                'period' => $value->order_date,
                'order' =>$value->count_orders,
                'sales' => $value->revenue,
                'profit' => $value->profit,
                'quantity' => $value->sales_volume,
            );
        }
        echo $data = json_encode($char_data);
    }
    public function days_order(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
//        $to_date = $data['to_date'];
        $get = Statistical::whereBetween('order_date',[$days,$now])->orderBy('order_date','ASC')->get();
        foreach ($get as $key => $value){
            $char_data[] = array(
                'period' => $value->order_date,
                'order' =>$value->count_orders,
                'sales' => $value->revenue,
                'profit' => $value->profit,
                'quantity' => $value->sales_volume,
            );
        }
        echo $data = json_encode($char_data);
    }
    public function select_filter(Request $request){
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $mottuan = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $motnam = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if ($data['dashboard_value']=='7ngay'){
            $get = Statistical::whereBetween('order_date',[$mottuan,$now])->orderBy('order_date','ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistical::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangnay'){
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = Statistical::whereBetween('order_date',[$motnam,$now])->orderBy('order_date','ASC')->get();
        }
        foreach ($get as $key => $value){
            $char_data[] = array(
                'period' => $value->order_date,
                'order' =>$value->count_orders,
                'sales' => $value->revenue,
                'profit' => $value->profit,
                'quantity' => $value->sales_volume,
            );
        }
        echo $data = json_encode($char_data);
    }
}
