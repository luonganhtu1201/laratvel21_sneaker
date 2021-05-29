<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    public function login(Request $request){
        $data = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        if (Auth::attempt($data)) {
            // Authentication passed...
            
            $request->session()->regenerate();
            if (User::where('email',$request->email)->value('role') == 1) {
                return redirect()->intended('/admin/dashboard');
            }else{
                
                return redirect()->intended('/client');
            }
        }else{
            return back()->withErrors([
                'email'=>'Thông tin user không đúng'
            ]);
        }
    }
}