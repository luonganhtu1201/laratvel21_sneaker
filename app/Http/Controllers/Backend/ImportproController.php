<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ImportproController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::search($request)->orderBy('id','desc')->paginate(5);
        // $products = Product::paginate(5);
        return view('backend.importspro.index',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function filter(Request $request){
        $categories = Category::all();
        $products = Product::query()
            ->status($request)
            ->category($request)
            ->paginate(5)
        ;
        return view('backend.importspro.index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
    public function onSale($id)
    {
        $on = Product::find($id);
        $on->status = 1;
        $on->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.imports.index')->with('success','Sản phẩm chuyển thành đang bán thành công !');
        }else{
            return redirect()->route('backend.imports.index')->with('error','Sản phẩm chuyển thành đang bán thất bại !');
        }
    }
    public function importing($id)
    {
        $on = Product::find($id);
        $on->status = 0;
        $on->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.imports.index')->with('success','Sản phẩm chuyển thành đang nhập thành công !');
        }else{
            return redirect()->route('backend.imports.index')->with('error','Sản phẩm chuyển thành đang nhập thất bại !');
        }
    }
    public function stopSell($id)
    {
        $on = Product::find($id);
        $on->status = -1;
        $on->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.imports.index')->with('success','Sản phẩm dừng bán thành công !');
        }else{
            return redirect()->route('backend.imports.index')->with('error','Sản phẩm dừng bán thất bại !');
        }
    }
}
