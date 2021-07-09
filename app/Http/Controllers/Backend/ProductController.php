<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Userinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

//        $products = Product::orderBy('updated_at','desc')->paginate(5);

        $categories = Category::all();
        $products = Product::search($request)->orderBy('id','desc')->paginate(5);
        // $products = Product::paginate(5);
        return view('backend.products.index',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $user = Auth::user();
//        if ($user->cannot('create',Product::class)){
//            abort(403);
//        }
//        cách 2
        $this->authorize('create',Product::class);
        $categories = Category::get();
        return view('backend.products.create',[
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $this->authorize('create',$product);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        if ($request->key && $request->value){
            $i=0;
            $key = $request->get('key');
            $value = $request->get('value');
            $arr1 = [];
            foreach ($request->key as $keyz){
                $arr = [$key[$i] => $value[$i]];
                $i++;
                $arr1 = array_merge($arr1, $arr);
            }
            $product->content_more = json_encode($arr1, JSON_UNESCAPED_UNICODE);
        }
        $product->status = $request->get('status');
//        $product->size = $request->get('size');
//        $product->color = $request->get('color');
//        $product->import_goods = $request->get('import_goods');
        $product->user_id = Auth::user()->id;
        $product->save();
        if ($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $file) {
//                Cách 1-----
//            $path = Storage::putFile('images', $file);

//            Cách 2----
//            $name = time() .'-anh.' . $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
//            $path = Storage::disk('public')
//                ->putFileAs('thu-muc', $file, $name);
//            Cách 3
//            $path = $file->store('file');
//            Cách 4
//            $name = $file->getClientOriginalName();
//            $file->move('image_1',$name);
//            dd(1);
                $disk_name ='public';
                $path = Storage::disk($disk_name)->putFileAs('images', $file, $name);
                $image = new Image();
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
//
        }
        for ($i = 0 ; $i < count($request->color); $i++){
            $warehouse = new Warehouse();
            $warehouse->size = $request->size[$i];
            $warehouse->color = Str::replace('#','',$request->color[$i]);
            $warehouse->import_goods = $request->import_goods[$i];
            $warehouse->inventory = $request->import_goods[$i];
            $warehouse->product_id = $product->id;
            $warehouse->save();
        }


        $save = 1;
        if ($save){
            return redirect()->route('backend.product.index')->with('success','Sản phẩm tạo thành công !');
        }else{
            return redirect()->route('backend.product.index')->with('error','Sản phẩm tạo thất bại !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
//        return
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        $products = Product::find($product->id);
        $categories = Category::get();
        $ware = $product->warehouses;
//        dd($ware);
//        $user = User::find(1);
//        forUser($user)->
//        cach 1
//        $user = Auth::user();
//        if ($user->can('update', $products)) {
//            return view('backend.products.edit',[
//            'categories' => $categories,
//            'product' => $products
//        ]);
//        }else{
//            abort(403);
//        }
//    cách2
//        if (Gate::denies('update-product',$products)){
//            abort(403);
//        }
//        return view('backend.products.edit',[
//            'categories' => $categories,
//            'product' => $products
//        ]);
//        cách 3
//        $this->authorize('update-product',$products);

        $images_product = $product->images;
//        dd($images_product);
        return view('backend.products.edit',[
            'categories' => $categories,
            'product' => $product,
            'images_product' => $images_product,
            'ware' => $ware
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $product = Product::find($id);
        $this->authorize('update',$product);
//        dd($request->color);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        if ($request->key != null && $request->value != null){
            $i=0;
            $key = $request->get('key');
            $value = $request->get('value');
            $arr1 = [];
            foreach ($request->key as $keyz){
                $arr = [$key[$i] => $value[$i]];
                $i++;
                $arr1 = array_merge($arr1, $arr);
            }
            $product->content_more = json_encode($arr1, JSON_UNESCAPED_UNICODE);
        }else{
            $product->content_more = null;
        }

        //status comment
//        $product->status = $request->get('status');


//        $product->size = $request->get('size');
//        $product->color = $request->get('color');
//        $product->import_goods = $request->get('import_goods');
        $product->user_id = Auth::user()->id;

//        $ware = $product->warehouses;
//        for ($i = 0 ; $i < count($ware) ; $i++){
//            $ware[$i]->delete();
//        }
//        for ($j = 0 ; $j < count($request->color); $j++){
//            $warehouse = new Warehouse();
//            $warehouse->size = $request->size[$j];
//            $warehouse->color = Str::replace('#','',$request->color[$j]);
//            $warehouse->import_goods = $request->import_goods[$j];
//            $warehouse->inventory = $request->import_goods[$j];
//            $warehouse->product_id = $product->id;
//            $warehouse->save();
//        }





//            for ($i = 0; $i<count($old_imgs);$i++){
////                dd($old_imgs[$i]);
//                $imgs = $product->images;
//                $imgs->delete($old_imgs[$i]);
//            }
        $disk_name ='public';
        if ($request->hasFile('image')){
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = Storage::disk($disk_name)->putFileAs('images', $file, $name);
                $image = new Image();
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        $old_imgs =$request->old_img;
        if ($old_imgs){
            for ($i = 0; $i<count($old_imgs);$i++) {
                $imgss = Image::where('id',$old_imgs[$i]);
                foreach ($imgss->get() as $img){
                    Storage::disk($disk_name)->delete($img->path);
                }
                $imgss->delete();
            }
        }
        $product->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.product.index')->with('success','Cập nhật sản phẩm thành công !');
        }else{
            return redirect()->route('backend.product.index')->with('error','Cập nhật sản phẩm thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $images_product = $product->images;
        $warehouse = $product->warehouses;
        for ($i=0;$i<count($warehouse);$i++){
            $warehouse[$i]->delete($warehouse[$i]->id);
        }
        $disk_name ='public';
        foreach ($images_product as $path){
            Storage::disk($disk_name)->delete($path->path);
        };
        for ($i=0;$i<count($images_product);$i++){
            $images_product[$i]->delete($images_product[$i]->id);
        }



        if ($product->delete()){
            return redirect()->route('backend.product.index')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.product.index')->with('error','Xóa thất bại !');
        }

    }
    public function showImages($id)
    {
        $imgs = Product::find($id);
//        $img = $imgs->warehouses;
//        for ($i = 0 ; $i<count($img);$i++){
//            echo $img[$i]->size;
//        }

        $imagez = $imgs->images;
        return view('backend.products.single-product',[
            'imgg'=>$imagez,
            'product'=>$imgs
        ]);
    }
    public function filter(Request $request){
        $categories = Category::all();
        $products = Product::query()
            ->status($request)
            ->category($request)
            ->paginate(5)
            ;
        return view('backend.products.index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
