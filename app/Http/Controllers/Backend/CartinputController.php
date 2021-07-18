<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\Importproduct;
use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartinputController extends Controller
{
    public function index()
    {
        $check = Supplier::all();
        $items = Cart::instance('import-product')->content();
//        dd($items);
        return view('backend.carts.index',[
            'check' => $check,
            'items' => $items
        ]);
    }
    public function showImport(Request $request){
        $imp = Import::query()->search($request)->status($request)->price($request)->paginate(7);
        return view('backend.carts.import_goods',[
            'import' => $imp,
        ]);
    }
    public function supp(Request $request){
        $supp_id = $request->supplier_id;
        $supp = Supplier::find($supp_id);
        $output['supp_name']='<input type="text" name="name" value="'.$supp->name.'" class="form-control">';
        $output['supp_email']='<input type="text" name="email" value="'.$supp->email.'" class="form-control">';
        $output['supp_phone']='<input type="text" name="phone" value="'.$supp->phone.'" class="form-control">';
        $output['supp_address']='<input type="text" name="address" value="'.$supp->address.'" class="form-control">';
        $output['supp_submit']='<p class="d-flex justify-content-end"><input type="submit" class="btn btn-success d-inline-block" value="Xác nhận nhập hàng"></p>';
        echo json_encode($output);
    }
    public function addImports(Request $request){
        $items = Cart::instance('import-product')->content();
//        dd($items);
        $total = Cart::instance('import-product')->subtotal();
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;
        $data['total'] = $total;
        $import = Import::create($data);
        foreach ($items as $item){
            $import->products()->attach($item->id,[
                'name' => $item->name,
                'qty' => $item->qty,
                'size' => $item->options->size,
                'color' => $item->options->color,
                'import_price' => $item->price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Cart::destroy();
        $save = 1;
        if ($save){
            return redirect()->route('backend.show.imports')->with('success','Thêm thành công !');
        }else{
            return redirect()->route('backend.show.imports')->with('error','Thêm thất bại !');
        }
    }
    public function add(Request $request,$id){
        $product =Product::find($id);
        $qty = $request->qty;
        Cart::instance('import-product')->add($product->id,$request->product_name,$qty,$request->input_price,0,[
            'image' => $product->images[0]->path,
            'size' => $request->size,
            'color' => $request->color
        ]);
        $save = 1;
        if ($save){
            return back()->with('success','Thêm thành công !');
        }else{
            return back()->with('error','Thêm thất bại !');
        }

    }
    public function remove($cart_id){
        Cart::instance('import-product')->remove($cart_id);
        $save = 1;
        if ($save){
            return redirect()->route('backend.cartinput.index')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.cartinput.index')->with('error','Xóa thất bại !');
        }
    }
    public function addWare($id){
        $import = Import::find($id);
        $import->status = 1;
        $import->update();
        $o = Importproduct::where('import_id',$import->id)->get();
        if ($import->status == 1){
            for ($i = 0 ; $i < count($o);$i++){
                $check = Warehouse::where('color',$o[$i]->color)->where('size',$o[$i]->size)->where('product_id',$o[$i]->product_id)->get();
                $check[0]->inventory = $check[0]->import_goods + $o[$i]->qty - $check[0]->sold_goods;
                $check[0]->import_goods += $o[$i]->qty ;
                $check[0]->update();
            }
        }
        $flag = 1;
        if ($flag){
            return redirect()->route('backend.show.imports')->with('success','Nhập hàng thành công');
        }else{
            return redirect()->route('backend.show.imports')->with('error','Nhập hàng thất bại');
        }
    }
    public function removeImport($id){
        $import = Import::find($id);
        $import->status = -1;
        $import->update();
        $flag = 1;
        if ($flag){
            return redirect()->route('backend.show.imports')->with('success','Hủy nhập hàng thành công');
        }else{
            return redirect()->route('backend.show.imports')->with('error','Hủy nhập hàng thất bại');
        }
    }
    public function billImport($id){
        $order = Import::find($id);
        $products = $order->products;
        $orderpro = Importproduct::where('import_id',$order->id)->get();
        return view('backend.carts.bill_import',[
            'ordersPro'=>$products,
            'order' => $order,
            'orders' => $orderpro
        ]);
    }
}
