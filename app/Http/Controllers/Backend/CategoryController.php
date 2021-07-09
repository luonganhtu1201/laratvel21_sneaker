<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parentcate = Category::where('parent_id',0)->get();
        $categories = Category::search($request)->orderBy('updated_at','asc')->paginate(3);
        // $categories = Category::paginate(3);
        return view('backend.categories.index',[
            'categories' => $categories,
            'parentcate'=> $parentcate

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Category::class);
        $cate_parent_id=Category::where('parent_id',0)->get();
        return view('backend.categories.create',[
            'categories_parent_id'=>$cate_parent_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // Category::create([
        //     'name'=>$request->name,
        //     'slug'=>Str::slug($request->name),
        //     'parent_id'=>$request->parent_id
        // ]);
        $cate = new Category();
        $this->authorize('create',$cate);
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->parent_id = $request->parent_id;
        $cate->user_id = Auth::user()->id;
        $cate->save();
        $save = 1;
        if ($save){
            return redirect()->route('backend.category.index')->with('success','Thêm Danh mục thành công !');
        }else{
            return redirect()->route('backend.category.index')->with('error','Thêm Danh mục thất bại !');
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
        $cate = Category::find($id);
        $cate_parent_id=Category::where('parent_id',0)->get();
        return view('backend.categories.edit',[
            'category'=>$cate,
            'categ_parent_id'=>$cate_parent_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $cate = Category::find($id);
        $this->authorize('create',$cate);
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->parent_id = $request->parent_id;
        $cate->user_id = Auth::user()->id;
        $cate->update();
        Cache::forget('categories');
        $update = 1;
        if ($update){
            return redirect()->route('backend.category.index')->with('success','Cập nhật thành công !');
        }else{
            return redirect()->route('backend.category.index')->with('error','Cập nhật thất bại !');
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
        $cate = Category::find($id);
        $this->authorize('delete',$cate);
        if ($cate->delete()){
            return redirect()->route('backend.category.index')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.category.index')->with('error','Xóa thất bại !');
        }
    }
    public function showProducts($category_id){
        $category = Category::find($category_id);
        $products = $category->products;
        // dd($products);
        return view('backend.categories.cate-products',[
            'cateproducts' => $products
        ]);
    }
    public function filter(Request $request){
        $parentcate = Category::where('parent_id',0)->get();
        $categories = Category::query()
            ->child($request)
            ->paginate(5);
        ;
        return view('backend.categories.index',[
            'categories' => $categories,
            'parentcate'=> $parentcate
        ]);
    }
}
