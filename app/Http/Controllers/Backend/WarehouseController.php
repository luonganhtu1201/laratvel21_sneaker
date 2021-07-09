<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\StoreWarehouseRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class WarehouseController extends Controller
{
    public function index(Request $request){
        $ware = Warehouse::query()
            ->soldout($request)
            ->proware($request)
            ->paginate(7);
        $admins = User::where('role',1)->get();

//        dd($admins);
        return view('backend.warehouses.index',[
            'warehouses' => $ware,
            'admins' => $admins
        ]);
    }
    public function edit($id){
        $wares = Warehouse::find($id);
        return view('backend.warehouses.edit',[
            'ware'=>$wares,
        ]);
    }
    public function update(Request $request,$id){
//        dd($request->all());
        $ware = Warehouse::find($id);
        $ware->size = $request->size;
        $ware->color = Str::replace('#','',$request->color);
        $ware->import_goods +=$request->import_goods;
        $ware->update();
        $ware->inventory = $ware->import_goods - $ware->sold_goods;
        $ware->update();
        $flag =1;
        if ($flag){
            return redirect()->route('backend.warehouse.index')->with('success','Cập nhật thành công !');
        }else{
            return redirect()->route('backend.warehouse.index')->with('error','Cập nhật thất bại !');
        }
    }
    public function destroy($id){
        $ware = Warehouse::find($id);
        $ware->delete();
        if ($ware->delete()){
            return back()->with('success','Xóa thành công !');
        }else{
            return back()->with('error','Xóa thất bại !');
        }
    }
    public function create($id){
        $product = Product::find($id);
        $ware = Warehouse::where('product_id',$product->id)->orderBy('size','ASC')->get();
        return view('backend.warehouses.create',[
            'product'=>$product,
            'ware' => $ware
        ]);
    }
    public function store(StoreWarehouseRequest $request){
        for ($j = 0 ; $j < count($request->color); $j++){
            $warehouse = new Warehouse();
            $warehouse->size = $request->size[$j];
            $warehouse->color = Str::replace('#','',$request->color[$j]);
            $warehouse->import_goods = $request->import_goods[$j];
            $warehouse->inventory = $request->import_goods[$j];
            $warehouse->product_id = $request->product_id;
            $warehouse->save();
        }
        $flag = 1;
        if ($flag){
            return redirect()->route('backend.warehouse.index')->with('success','Thêm mới thành công !');
        }else{
            return redirect()->route('backend.warehouse.index')->with('error','Thêm mới thất bại !');
        }
    }
}
