<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Mail\MailNotify;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderproduct;
use App\Models\Product;
use App\Models\Statistical;
use App\Models\Warehouse;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            ->search($request)
            ->status($request)
            ->price($request)
            ->paginate(7);
        return view('backend.orders.index',['orders'=>$orders]);
    }
    public function filter(Request $request){
        $orders = Order::query()
            ->search($request)
            ->status($request)
            ->price($request)
            ->paginate(7);
        return view('backend.orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showProducts($order_id){
        $order = Order::find($order_id);
        $products = $order->products;
        $orderpro = Orderproduct::where('order_id',$order->id)->get();
        return view('backend.orders.orders-products',[
            'ordersPro'=>$products,
            'order' => $order,
            'orders' => $orderpro
        ]);
    }
    public function cancelOrder($id){
        $order = Order::find($id);
        $o = Orderproduct::where('order_id',$order->id)->get();
        if ($order->status == 1 || $order->status == 2 || $order->status == 3){
            for ($i = 0 ; $i < count($o);$i++){
                $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
                $check[0]->sold_goods -= $o[$i]->qty ;
                $check[0]->inventory = $check[0]->import_goods - $check[0]->sold_goods;
                $check[0]->update();
            }
        }
        $order->status = -1;
        $order->update();
        $flag = 1;
        if ($flag){
            return back()->with('success','Hủy đơn thành công');
        }else{
            return back()->with('error','Hủy đơn thất bại');
        }

    }
    public function addCart($id){
        $order = Order::find($id);
        $order->status += 1;
        $order->updated_at = Carbon::now();
        $order->update();
        $o = Orderproduct::where('order_id',$order->id)->get();
        if ($order->status == 1){
            for ($i = 0 ; $i < count($o);$i++){
                $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
                    $check[0]->sold_goods += $o[$i]->qty ;
                    $check[0]->inventory = $check[0]->import_goods - $check[0]->sold_goods;
                    $check[0]->update();

            }
        }
        if ($order->status == 3){
            $now = Carbon::now()->format('Y-m-d');
            if ($sta = Statistical::where('order_date', $now)->first()){
                $price = $order->total;
                $sta->revenue += $order->total;
                $profit = 0;
                $count = 0;
                foreach ($order->orderproducts as $order){
                    $prof = Product::find($order->product_id)->origin_price * $order->qty;
                    $count +=1;
                    $profit += $prof;
                }

                $st =  $price - $profit;
                $sta->profit += $st;
                $sta->count_orders += 1;
                $sta->sales_volume += $count;
                $sta->order_date = $now;
                $sta->save();
            }else{
                $sta = new Statistical();
                $sta->revenue = $order->total;
                $profit = 0;
                $count = 0;
                foreach ($order->orderproducts as $order){
                    $prof = Product::find($order->product_id)->origin_price * $order->qty;
                    $count +=1;
                    $profit += $prof;
                }
                $sta->count_orders = 1;
                $sta->sales_volume = $count;
                $sta->profit = $sta->revenue - $profit;
                $sta->order_date = $now;
                $sta->save();
            }
        }
        if ($order->status == 1){
            $items = Orderproduct::where('order_id',$order->id)->get();
            $details['user_info'] = $order;
            $details['products'] = $items;
            $details['email'] = User::find($order->user_id)->email;
//            dd($details);
            $emails = User::find($order->user_id)->email;
            Mail::to($emails)->send(new MailNotify($details));
        }
        $flag = 1;
        if ($flag){
            return back()->with('success','Cập nhật đơn thành công');
        }else{
            return back()->with('error','Cập nhật đơn thất bại');
        }
    }
    public function noReturn($id){
        $order = Order::find($id);
        $order->status = 3;
        $order->update();
        $flag = 1;
        if ($flag){
            return back()->with('success','Không nhận hàng trả lại thành công');
        }else{
            return back()->with('error','Không nhận hàng trả lại thất bại');
        }
    }
    public function okReturn($id){
        $order = Order::find($id);
        $order->status = -3;
        $order->update();
        $flag = 1;
        if ($flag){
            return back()->with('success','Chấp nhận trả hàng');
        }else{
            return back()->with('error','Không chấp nhận trả hàng');
        }
    }
    public function successReturn($id){
        $order = Order::find($id);
        $order->status = -4;
        $o = Orderproduct::where('order_id',$order->id)->get();
        for ($i = 0 ; $i < count($o);$i++){
            $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
            $check[0]->sold_goods -= $o[$i]->qty ;
            $check[0]->inventory = $check[0]->import_goods - $check[0]->sold_goods;
            $check[0]->update();
        }
        $order->update();
        $date = date('Y-m-d', strtotime($order->created_at));
        $sta = Statistical::where('order_date', $date)->first();
        $price = $order->total;


        $profit = 0;
        $count = 0;
        foreach ($order->orderproducts as $order){
            $prof = Product::find($order->product_id)->origin_price * $order->qty;
            $count +=1;
            $profit += $prof;
        }
        $st = $price - $profit;
        $sta->profit = $sta->profit - $st;
        $sta->revenue = $sta->revenue - $price;
        $sta->order_date = $date;
        $sta->save();
//        $now = Carbon::now()->format('Y-m-d');
//        if ($sta = Statistical::where('order_date', $now)->first()){
//            $price = $order->total;
//
//
//            $profit = 0;
//            $count = 0;
//            foreach ($order->orderproducts as $order){
//                $prof = Product::find($order->product_id)->origin_price * $order->qty;
//                $count +=1;
//                $profit += $prof;
//            }
//
//            $st = $price - $profit;
//            $sta->profit = $sta->profit - $st;
//            $sta->revenue = $sta->revenue - $price;
////            $sta->count_orders = $sta->count_orders;
////            $sta->sales_volume = $sta->sales_volume;
//            $sta->order_date = $now;
//            $sta->save();
//        }else{
//            $sta = new Statistical();
//            $sta->revenue = -$order->total;
//            $profit = 0;
//            $count = 0;
//            foreach ($order->orderproducts as $order){
//                $prof = Product::find($order->product_id)->origin_price * $order->qty;
//                $count +=1;
//                $profit += $prof;
//            }
//            $sta->count_orders = 1;
//            $sta->sales_volume = $count;
//            $sta->profit = $sta->revenue + $profit;
//            $sta->order_date = $now;
//            $sta->save();
//        }


        $flag = 1;
        if ($flag){
            return back()->with('success','Nhận được hàng trả lại');
        }else{
            return back()->with('error','Không nhận được hàng trả lại ');
        }
    }

}
