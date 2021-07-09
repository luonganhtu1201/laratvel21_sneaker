<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Product;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        $order->update();
        $o = Orderproduct::where('order_id',$order->id)->get();
        if ($order->status == 1){
            for ($i = 0 ; $i < count($o);$i++){
                $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
                    $check[0]->sold_goods += $o[$i]->qty ;
                    $check[0]->update();

            }
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
            return back()->with('success','Không nhận hàng trả lại thành công');
        }else{
            return back()->with('error','Không nhận hàng trả lại thất bại');
        }
    }
    public function successReturn($id){
        $order = Order::find($id);
        $order->status = -4;
        $o = Orderproduct::where('order_id',$order->id)->get();
        for ($i = 0 ; $i < count($o);$i++){
            $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
            $check[0]->sold_goods -= $o[$i]->qty ;
            $check[0]->update();
        }
        $order->update();
        $flag = 1;
        if ($flag){
            return back()->with('success','Không nhận hàng trả lại thành công');
        }else{
            return back()->with('error','Không nhận hàng trả lại thất bại');
        }
    }

}
