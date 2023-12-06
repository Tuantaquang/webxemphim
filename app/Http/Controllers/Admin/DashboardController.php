<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Phim;
use App\Models\TapPhim;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{

    public function home(){
        $danhmuc_count = Danhmuc::all()->count();
        $theloai_count = TheLoai::all()->count();
        $phim_count = Phim::all()->count();
        $tap_count = TapPhim::all()->count();
        
        $phim = Phim::orderby('id','desc')->paginate(12);
        return view('admin.layout.admin_content',compact('danhmuc_count','theloai_count','phim_count','tap_count','phim'));
    }

    public function info_phim($slug){
        $danhmuc_count = Danhmuc::all()->count();
        $theloai_count = TheLoai::all()->count();
        $phim_count = Phim::all()->count();
        $tap_count = TapPhim::all()->count();
        
        $phim = Phim::with('danhmuc', 'theloai', 'the_loais')->where('slug', $slug)->where('status', '1')->first();
        return view('admin.layout.info-phim',compact('danhmuc_count','theloai_count','phim_count','tap_count','phim'));
    }
}