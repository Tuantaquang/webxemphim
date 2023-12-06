<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\TheLoai;
use App\Models\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NguoidungController extends Controller
{
    public function user_login()
    {

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();
        return view('pages.user.user-login', compact('theloai', 'danhmuc'));
    }
    public function user_post_login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Xác thực thành công
            return redirect()->route('home');
        } else {
            // Xác thực không thành công
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }

       
    }

    public function logout()
    {

        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }


    public function user_register()
    {

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();
        return view('pages.user.user-register', compact('theloai', 'danhmuc'));
    }

    public function user_post_register(Request $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);

        // dd($request->all());
        User::create($request->all());
        return redirect()->route('user_login')->with('success', 'Đăng kí thành công!');
    }
}