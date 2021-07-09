<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\Userinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller{
    public function showForm(){
        return view('frontend.auth.register');
    }
    public function register(StoreRegisterRequest $request){
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $userid = User::where('email',$request->email)->value('id');
        $usinf = new Userinfo();
        $usinf->address = $request->address;
        $usinf->phone = $request->phone;
        $usinf->user_id = $userid;
        $usinf->gender = $request->gender;
        if ($request->gender == 0){
            $usinf->avatar = 'avatar/man.jpg' ;
        }else{
            $usinf->avatar = 'avatar/woman.jpg';
        };
        $usinf->save();
        // Userinfo::create([
        //     'address'=>$request->get('address')
        // ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/client');
        }
    }
}
