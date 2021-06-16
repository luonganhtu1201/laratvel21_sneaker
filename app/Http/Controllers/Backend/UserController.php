<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at','asc')->paginate(5);
        return view('backend.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            $usinf->avatar = 'avatar/man.jpg' ;
        }else {
            $usinf->avatar = 'avatar/woman.jpg';
        }
        $usinf->save();
        return redirect()->intended('/admin/users/index');
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
        $user = User::find($id);
        return view('backend.users.edit',[
            'user'=>$user
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $userinf = $user->userinfo;
        $userinf->phone = $request->phone;
        $userinf->address = $request->address;
        $userinf->gender = $request->gender;
//        dd($userinf->avatar);
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


//        dd($request->all());
        $userinf->update();
        $user->update();
        return redirect()->route('backend.user.index');
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
        $userinf = Userinfo::where('user_id',$id);
        $user->delete();
        $userinf->delete();
        return redirect()->route('backend.user.index');
    }
    public function showProducts($user_id){
        $user = User::find($user_id);
        $products = $user->products;
        // dd($user);
        return view('backend.users.user-products',[
            'usproducts' => $products
        ]);
    }
}
