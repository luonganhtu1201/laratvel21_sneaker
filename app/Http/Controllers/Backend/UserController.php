<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->role == 3){
            $users = User::search($request)->orderBy('id','DESC')->where('role','<>',3)->paginate(5);
        }elseif ($user->role == 1){
            $users = User::search($request)->orderBy('id','DESC')->where('role','=',0)->paginate(5);
        }

        return view('backend.users.index',[
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
//        dd($request->all());
        $user = new User();
        $this->authorize('create',User::class);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        $userid = User::where('email',$request->email)->value('id');
        $usinf = new Userinfo();
        $usinf->address = $request->address;
        $usinf->phone = $request->phone;
        $usinf->user_id = $userid;
        $usinf->gender = $request->gender;

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $disk_name ='public';
            $path = Storage::disk($disk_name)->putFileAs('avatar', $file, $name);
            $usinf->avatar = $path;
        }elseif ($request->gender == 0){
            $usinf->avatar = 'avatar/man.jpg';
        }else {
            $usinf->avatar = 'avatar/woman.jpg';
        }
        $usinf->save();
        $save = 1;
        if ($save){
            return redirect()->intended('/admin/users')->with('success','Thêm thành công !');
        }else{
            return redirect()->intended('/admin/users')->with('error','Thêm thất bại !');
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
        $userRole = User::find($id);
        return view('backend.users.edit',[
            'user'=>$userRole
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update',User::class);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $userinf = $user->userinfo;
        $userinf->phone = $request->phone;
        $userinf->address = $request->address;
        $userinf->gender = $request->gender;
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
        if ($update){
            return redirect()->intended('/admin/users')->with('success','Cập nhật thành công !');
        }else{
            return redirect()->intended('/admin/users')->with('error','Cập nhật thất bại !');
        }
    }
    public function update_Self(UpdateUserRequest $request, $id){
        $user = User::find($id);
        $this->authorize('update',User::class);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $userinf = $user->userinfo;
        $userinf->phone = $request->phone;
        $userinf->address = $request->address;
        $userinf->gender = $request->gender;
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
        if (Auth::attempt(['email'=>$user->email,'password'=>$request->password])) {
            $request->session()->regenerate();
            Alert::success('Thành công','Thông tin của bạn đã được cập nhật !');
            return redirect()->intended('/admin/users/update-self')->with('success','Cập nhật thành công !');
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
        $user = User::find($id);
        if (Gate::denies('role-check',$user)){
            abort(403);
        }
        $userinf = Userinfo::where('user_id',$id);
        $productinf = Product::where('user_id',$id)->get();
        $categoryinf = Category::where('user_id',$id)->get();
        foreach ($categoryinf as $cat){
            $cat->user_id = Auth::user()->id;
            $cat->update();
        }
         foreach ($productinf as $pro){
           $pro->user_id = Auth::user()->id;
           $pro->update();
        }
        $user->delete();
        $userinf->delete();
        $delete = 1;
        if ($delete){
            return redirect()->route('backend.user.index')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.user.index')->with('error','Xóa thất bại !');
        }

    }
    public function showProducts($user_id){
        $user = User::find($user_id);
        $products = $user->products;
        // dd($user);
        return view('backend.users.user-products',[
            'usproducts' => $products
        ]);
    }
    public function filter(Request $request){
        $users = User::query()
            ->role($request)
            ->paginate(5)
        ;
        return view('backend.users.index',[
            'users'=>$users,

        ]);
    }
    public function updateSelf(){
        $userRole = Auth::user();
        $us = User::find($userRole->id)->created_at;
//        dd($us);
        return view('backend.users.update_self',[
            'user'=>$userRole
        ]);
    }
}
