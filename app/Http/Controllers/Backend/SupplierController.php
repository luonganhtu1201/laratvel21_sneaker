<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $users = Supplier::orderBy('id','DESC')->paginate(5);

        return view('backend.suppliers.index',[
            'users'=>$users,
        ]);
    }
    public function create()
    {
        $this->authorize('create', Supplier::class);
        return view('backend.suppliers.create');
    }
    public function store(StoreSupplierRequest $request)
    {
        $sup = new Supplier();
        $this->authorize('create', Supplier::class);
        $sup->name = $request->name;
        $sup->email = $request->email;
        $sup->phone = $request->phone;
        $sup->address = $request->address;
        $sup->save();
        $save = 1;
        if ($save){
            return redirect()->route('backend.supplier.index')->with('success','Thêm nhà cung cấp thành công !');
        }else{
            return redirect()->route('backend.supplier.index')->with('error','Thêm nhà cung cấp thất bại !');
        }
    }
    public function edit($id)
    {
        $sup = Supplier::find($id);
        return view('backend.suppliers.edit',[
            'supplier'=>$sup
        ]);
    }
    public function update(UpdateSupplierRequest $request, $id)
    {
        $sup = Supplier::find($id);
        $this->authorize('update', Supplier::class);
        $sup->name = $request->name;
        $sup->email = $request->email;
        $sup->phone = $request->phone;
        $sup->address = $request->address;
        $sup->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.supplier.index')->with('success','Cập nhật thành công !');
        }else{
            return redirect()->route('backend.supplier.index')->with('error','Cập nhật thất bại !');
        }
    }
    public function destroy($id)
    {
        $sup = Supplier::find($id);
        $this->authorize('delete', Supplier::class);
        $sup->delete();
        $delete = 1;
        if ($delete){
            return redirect()->route('backend.supplier.index')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.supplier.index')->with('error','Xóa thất bại !');
        }

    }
}
