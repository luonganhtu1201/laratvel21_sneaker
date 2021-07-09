<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status','<>',-1)->orderBy('created_at','desc')->limit(5)->get();
        $topSalePrice = Product::where('status','<>',-1)->orderBy('sale_price','desc')->limit(3)->get();
//
        $top1import = Product::where('status','<>',-1)->orderBy('sale_price','ASC')->first()->get();
        $productsAll = Product::all();
        $productt = Product::where('status','<>',-1)->orderBy('id','DESC')->limit(10)->paginate(8);
        $proNike = Product::where('status','<>',-1)->where('category_id',1)->limit(5)->get();
        $proAdidas = Product::where('status','<>',-1)->where('category_id',2)->limit(5)->get();
        $proBalen = Product::where('status','<>',-1)->where('category_id',5)->limit(5)->get();
        $proOut = Product::where('status','<>',-1)->whereHas('warehouses',function ($q){
            $q->where('import_goods','>','30');
        })->get();
        return view('frontend.client.home',[
            'products' => $products,
            'productt' => $productt,
            'topSale' => $topSalePrice,
            'productQView' => $productsAll,
            'top1import' => $top1import,
            'proNike' => $proNike,
            'proAdidas' => $proAdidas,
            'proBalen' => $proBalen,
            'proOut' => $proOut,
        ]);
    }
    public function showImages(Request $request,$id)
    {

        $imgs = Product::find($id);

        $check = Warehouse::where('product_id',$imgs->id)->orderBy('size','ASC')->select('size')->distinct()->get();

//        dd($check[0]->size);

        if ($request->has('size')){
            $size = $request->get('size');
            $ware = Warehouse::where('size', $size)->where('product_id',$id)->get();
            if (count($ware)!=0){
                for ($i = 0 ; $i <count($ware);$i++){
                    if ($ware[$i]->size == $request->size){
                        $color[] = $ware[$i]->color;
                    }
                }
            }else{
                $color[] = '';
            }
        }else{
            $color[] = '';
        }

        $imagez = $imgs->images;

        $cmt = $imgs->comments;
        if (count($cmt)!=0){
            foreach ($cmt as $cm){
                $user[] = User::find($cm->user_id);
            }
        }else{
            $user[] = null ;
        }
        $proRelated = Product::where('category_id',$imgs->category_id)->where('id','<>',$imgs->id)->orderBy('id','ASC')->limit(5)->get();
//        dd($proRelated);

        return view('frontend.client.single-product',[
            'imgg'=>$imagez,
            'infoProduct' => $imgs,
            'comments' => $cmt,
            'users' => $user,
            'color' => $color,
            'proRelated'=> $proRelated,
            'checkSize' => $check
        ]);
    }
    public function categoryPro(Request $request){
        $products = Product::search($request)
            ->orderBy('id','desc')
            ->order($request)
            ->category($request)
            ->price($request)
            ->sz($request)
            ->paginate(9)
        ;
//        if ($request->has('size')){
//            $size = $request->size;
//            $products = Product::whereHas('warehouses',function ($q) use ($size){
//                $q->where('size',39);
//            })->get();
//        }
//        dd($products);



//        if ($request->has('size')){
//            $size = $request->get('size');
//            $ware = Warehouse::where('size', $size)->select('product_id')->distinct()->get();
//
//            $product = [];
//            if (count($ware)!=0){
//                foreach ($ware as $item) {
//                    $box[] = Product::where('id', $item->product_id)->get();
//
//                }
//                for ($i = 0 ; $i < count($box);$i++) {
//                    $product[] = $box[$i][0];
//                }
//                $products = $product;
//            }else{
//                $products = '';
//            }
//
//        }

        $idcategory = Category::all();
        $recent = Product::orderBy('id','DESC')->limit(4)->get();



        return view('frontend.client.category-product',[
            'productAll' => $products,
            'categories' => $idcategory,
            'recent' => $recent
        ]);

    }


    public function filter(Request $request){
        $idcategory = Category::all();
        $products = Product::query()
            ->order($request)
            ->category($request)
            ->price($request)
            ->sz($request)
            ->paginate(9)
        ;
        $recent = Product::orderBy('id','DESC')->limit(4)->get();
        return view('frontend.client.category-product',[
            'productAll' => $products,
            'categories' => $idcategory,
            'recent' => $recent
        ]);
    }
    public function comment(Request $request){
//        dd($request->all());
        $cmt = new Comment();
        $cmt->user_id = Auth::user()->id;
        $cmt->content = $request->comment;
        $cmt->product_id = $request->product_id;
        $cmt->save();
        $id = $request->product_id;
        $imgs = Product::find($id);
        $cmt = $imgs->comments;
        if (count($cmt)!=0){
            foreach ($cmt as $cm){
                $user[] = User::find($cm->user_id);
            }
        }else{
            $user[] = null ;
        }

        $imagez = $imgs->images;
        return view('frontend.client.single-product',[
            'imgg'=>$imagez,
            'infoProduct' => $imgs,
            'users' => $user,
            'comments' => $cmt,
        ]);

    }
    public function cart(){
        return view('frontend.client.cart');
    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $output['product_id'] = '<a href="/show/'.$product->id.'" class="btn btn-danger" type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> | See details</a>';
        $output['product_name'] = $product->name;
        $output['product_content'] = $product->content;
        $output['product_origin_price'] = number_format($product->origin_price).' VNĐ';
        $output['product_sale_price'] = number_format($product->sale_price).' VNĐ';
        if (count($product->images)==0){
            $output['product_imgone'] = '<a href="" aria-controls="view1" data-toggle="tab"><img  src="/frontend/images/no-image.png" alt></a>';
            $output['product_gallery'] = '<a href="" aria-controls="view1" data-toggle="tab"><img  src="/frontend/images/no-image.png" alt></a>';
        }else{
            $output['product_imgone'] = '<a href="" aria-controls="view1" data-toggle="tab"><img src="'.$product->images[0]->image_url.'" alt=""></a>';
            $output['product_gallery'] ='';
            for ($i=0;$i<count($product->images);$i++){
                $output['product_gallery'] .= '<a href=""><img src="'.$product->images[$i]->image_url.'" alt=""></a>';
            }
        }
        echo json_encode($output);
    }
}
