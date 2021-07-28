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
        $this->authorize('create',Product::class);
        $categories = Category::where('parent_id','<>',0)->get();
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
        $product->status = -1;
        $product->user_id = Auth::user()->id;
        $product->save();
        if ($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $file) {
            $name = $file->getClientOriginalName();
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
            $warehouse->import_goods = 0;
            $warehouse->inventory = 0;
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
        $categories = Category::get();
        $ware = $product->warehouses;
        $images_product = $product->images;
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
        $product->user_id = Auth::user()->id;
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
