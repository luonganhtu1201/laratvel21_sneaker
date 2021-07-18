<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePassforgotRequest;
use App\Http\Requests\UpdatePassusRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\MailPassword;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Passwordresets;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
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

        $imgs = Product::where('slug',$id)->first();

        $check = Warehouse::where('product_id',$imgs->id)
            ->orderBy('size','ASC')
            ->select('size')
            ->distinct()
            ->get();

//        dd($check[0]->size);

        if ($request->has('size')){
            $size = $request->get('size');
            $ware = Warehouse::where('size', $size)->where('product_id',$imgs->id)->get();
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
        $proRelated = Product::where('status','<>',-1)->where('category_id',$imgs->category_id)->where('id','<>',$imgs->id)->orderBy('id','ASC')->limit(5)->get();
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
        $products = Product::query()
            ->search($request)
            ->orderBy('id','desc')
            ->order($request)
            ->category($request)
            ->price($request)
            ->sz($request)
            ->paginate(9)
        ;

        $idcategory = Category::all();
        $recent = Product::where('status','<>',-1)->orderBy('id','DESC')->limit(4)->get();



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
        $recent = Product::where('status','<>',-1)->orderBy('id','DESC')->limit(4)->get();
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
        $output['product_id'] = '<a href="/show/'.$product->slug.'" class="btn btn-danger" type="submit"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> | See details</a>';
        $output['product_name'] = $product->name;
        $output['product_content'] = $product->content;
        $output['product_origin_price'] = number_format($product->sale_price+$product->sale_price*40/100).' $';
        $output['product_sale_price'] = number_format($product->sale_price).' $';
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
    public function profile(){
        if(Auth::user()){
            return view('frontend.client.profile');
        }else{
            return redirect()->route('client.home');
        }

    }
    public function update(UpdateProfileRequest $request, $id)
    {
//        dd($request->all());
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $userinf = $user->userinfo;
        $userinf->phone = $request->phone;
        $userinf->address = $request->address;
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $disk_name ='public';
            $path = Storage::disk($disk_name)->putFileAs('avatar', $file, $name);
            if ($userinf->avatar != "avatar/man.jpg" && $userinf->avatar != "avatar/woman.jpg") {
                Storage::disk($disk_name)->delete($userinf->avatar);
            }
            $userinf->avatar = $path;
        };
        $userinf->update();
        $user->update();
        $update = 1;
        if ($update) {
            alert()->success('Success', 'Your information has been updated successfully');
        }else {
            alert()->error('Error', 'Something went wrong!');
        }
        return back();
    }
    public function updatePass(UpdatePassusRequest $request,$id){
        $userz = User::find($id);
        $userz->password = Hash::make($request->newpassword);
        $userz->update();
        if (Auth::attempt(['email'=>$userz->email,'password'=>$request->newpassword])) {
            $request->session()->regenerate();
            Alert::success('Success','Your password has been changed successfully');
            return redirect()->intended('/my-account');
        }
    }
    public function forgot_password(){
        if (!Auth::user()){
            return view('frontend.auth.forgot-password');
        }else{
            return redirect()->route('client.home');
        }

    }
    public function password_retrieval(UpdatePassforgotRequest $request){
        $user = User::where('email',$request->email)->first();
        if ($user == null){
            Alert::error('OOPS !', 'Your email is not registered. Please check again .... ');
            return back();
        }else{
            $token = $request->_token;
            $emails = $user->email;
            $nameUs = $user->name;
            $passReset = new Passwordresets();
            $passReset->email = $emails;
            $passReset->token = $token;
            $passReset->created_at = Carbon::now();
            $passReset->updated_at = Carbon::now();
            $passReset->save();
            $details['email'] = $emails;
            $details['token'] = $token;
            $details['name'] = $nameUs;
            Mail::to($emails)->send(new MailPassword($details));
            Alert::success('Success','You have successfully requested to reset your account password. Please check your email ! Thanks');
            return redirect()->route('client.home');
        }

    }
    public function change_passsword(Request $request){
//        dd($request->all());
        $token = $request->_token;
        $email = $request->email;

        return view('frontend.auth.change-password',[
            'tokenPass' => $token,
            'emailPass' => $email
        ]);
    }
    public function change_pass_success(UpdatePassusRequest $request){
        $passResets = Passwordresets::where('token',$request->tokenPass)->where('email',$request->emailPass)->first();
        if ($passResets){
            $passResets->where('token',$request->tokenPass)->delete();
            $user = User::where('email',$request->emailPass)->first();
            $user->password = Hash::make($request->newpassword);
            $user->update();
//            dd('OK');
            if (Auth::attempt(['email'=>$request->emailPass,'password'=>$request->newpassword])) {
                $request->session()->regenerate();
                Alert::success('Success','Your password has been changed successfully');
                return redirect()->intended('/');
            }
        }else{
            Alert::error('Error','Something went wrong !');
            return back();
        }
    }
}
