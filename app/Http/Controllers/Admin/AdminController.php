<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // public function AuthLogin()
    // {

    //     if (Auth::check()) {
    //         return redirect()->route('admin.home');
    //     } else {
    //         return redirect()->route('admin_login')->send();
    //     }
    // }
    
    public function admin_login(){
        return view('admin.login');
    }

    public function admin_postlogin(Request $request){
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password , 'role'=>'0'])){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error','sai tài khoản hoặc mật khẩu');
        };
       
    }

    public function admin_logout(){

        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('admin_login');
    }
}