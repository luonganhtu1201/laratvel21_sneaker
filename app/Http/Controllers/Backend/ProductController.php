<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Userinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at','desc')->paginate(5);
        // $products = Product::paginate(5);
        return view('backend.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
//        dd($request->all());

        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->size = $request->get('size');
        $product->color = $request->get('color');
        $product->import_goods = $request->get('import_goods');
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
        }else{
            dd('khong co file');
        };


        return redirect()->route('backend.product.index');
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
        $products = Product::find($id);
        $categories = Category::get();
        return view('backend.products.edit',[
            'categories' => $categories,
            'product' => $products
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
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->size = $request->get('size');
        $product->color = $request->get('color');
        $product->import_goods = $request->get('import_goods');
        $product->user_id = Auth::user()->id;
        if ($request->hasFile('image')){
            $files = $request->file('image');
            $disk_name ='public';
            if ($product->images){
                $imgs =  $product->images;
                foreach ($imgs as $img){
                    Storage::disk($disk_name)->delete($img->path);
                    $img->delete($img->id);
                };
            }
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
        $product->update();
        return redirect()->route('backend.product.index');
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
        $product->delete();
        return redirect()->route('backend.product.index');
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
}
