<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request;

class CartController extends Controller
{
    public function index(){
        $items = Cart::content();
        return view('frontend.client.cart')->with(['items'=>$items]);
    }
    public function add(Request $request,$id){
        $product =Product::find($id);
        $qty = $request->qtybutton;
        if ($request->size && $request->color){
            Cart::add($product->id,$product->name,$qty,$product->sale_price,0,[
                'image' => $product->images[0]->path,
                'size' => $request->size,
                'color' => $request->color
            ]);
        }else{
            Cart::add($product->id,$product->name,1,$product->sale_price,0,[
                'image' => $product->images[0]->path,
                'size' => $product->warehouses[0]->size,
                'color' => $product->warehouses[0]->color
            ]);
        }
        $add = 1;
        if ($add) {
            alert()->success('Add Cart', 'Successfully');
        }else {
            alert()->error('Add Cart', 'Something went wrong!');
        }

        return redirect()->route('frontend.cart.index');
    }
    public function remove($cart_id){
        Cart::remove($cart_id);
        $remove = 1;
        if ($remove) {
            alert()->success('Remove', 'Remove Successfully');
        }else {
            alert()->error('Remove', 'Something went wrong!');
        }
        return back();
    }
    public function destroy(){
        Cart::destroy();
        return redirect()->route('frontend.cart.index');
    }

    public function update(Request $request){
//        dd($request->qty);
        Cart::update($request->rowId,$request->qty);
    }
    public function addtoOrder(Request $request){

        //cái total này !
        $items = Cart::content();
        $total = Cart::subtotal();
//        foreach ($items as $item){
//            $check=Warehouse::where('product_id',$item->id)
//                ->where('size',$item->options->size)
//                ->where('color',$item->options->color)
//                ->get();
//            $check[0]->sold_goods+=$item->qty;
//            $check[0]->update();
//        }
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;
        $data['total'] = $total;

//        dd($items);
        $order = Order::create($data);

        foreach ($items as $item){
            $order->products()->attach($item->id,[
                'name' => $item->name,
                'qty' => $item->qty,
                'size' => $item->options->size,
                'color' => $item->options->color,
                'sale_price' => $item->price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Cart::destroy();
        $user = Auth::user()->id;
        $order = Order::where('user_id',$user)->orderBy('id','DESC')->get();
        $orderss = 1;
        if ($orderss) {
            alert()->success('Order', 'Your order has been placed successfully');
        }else {
            alert()->error('Order', 'There is a problem with your order !');
        }
        return redirect()->route('frontend.cart.status',[
            'user_info' => $order,
        ]);
    }
    public function statusCart(){
        $user = Auth::user()->id;
        $order = Order::where('user_id',$user)->orderBy('id','DESC')->get();
        return view('frontend.client.statusCart',[
            'user_info' => $order,
        ]);
    }
    public function usCancel($id){
        $order = Order::find($id);
        $order->status = -5;
        $order->update();
        $flag = 1;
        if ($flag) {
            alert()->success('Cancel Order', 'Your order has been successfully canceled');
        }else {
            alert()->error('Cancel Order', 'Your order has been canceled unsuccessfully');
        }
        return redirect()->route('frontend.cart.status');
    }
    public function usRepro($id){
        $order = Order::find($id);
        $order->status = -2;
        $order->update();
        $flag = 1;
        if ($flag) {
            alert()->success('Request a return', 'Product return request successful');
        }else {
            alert()->error('Request a return', 'Product return request failed');
        }
        return redirect()->route('frontend.cart.status');

    }
}