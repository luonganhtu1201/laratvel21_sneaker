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
        $user = count(User::all());
        $product = count(Product::all());
        $products = Product::orderBy('created_at','DESC')->where('status',0)->skip(0)->take(5)->get();
        $sumOrder = count(Order::where('status',3)->get());
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
    }
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
