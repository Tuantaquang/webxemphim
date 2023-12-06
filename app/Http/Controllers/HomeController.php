<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Info;
use App\Models\Phim;
use App\Models\Phim_DanhMuc;
use App\Models\TheLoai;
use App\Models\PhimTheLoai;
use App\Models\Rating;
use App\Models\TapPhim;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        
        
        $phim_hot = Phim::withCount('tapphim')->where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->get();
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        // $danhmuc_home =  Danhmuc::with('phim')->orderby('id', 'desc')->where('status', '1')->get();
        
        $all_phim =  Phim::withCount('tapphim')->orderby('ngay_cap_nhat', 'desc')->where('status', '1')->paginate(20);
        // $all_phim =  TapPhim::with('phim')->orderby('id', 'desc')->paginate(20);
        return view('pages.layout.main', compact('danhmuc', 'theloai', 'phim_hot', 'all_phim', 'topview'));
    }

    public function danhmuc($slug)
    {
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        $danhmuc_slug = Danhmuc::where('slug', $slug)->first();
        //nhiều danh mục
        $danhmucs = Phim_DanhMuc::where('id_danhmuc', $danhmuc_slug->id)->get();
        $nhieudm = [];
        foreach ($danhmucs as $key => $dms) {
            $nhieudm[] = $dms->id_phim;
        }
        $phim_dm = Phim::withCount('tapphim')->whereIn('id', $nhieudm)->orderby('ngay_cap_nhat', 'desc')->paginate(20);
        // $phim_dm = Phim::withCount('tapphim')->where('id_danhmuc', $danhmuc_slug->id)->orderby('ngay_cap_nhat', 'desc')->paginate(20);
        return view('pages.danhmucs.danhmuc', compact('danhmuc', 'theloai', 'danhmuc_slug', 'phim_dm', 'phim_moi', 'topview'));
    }

    public function theloai($slug)
    {
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        $theloai_slug = TheLoai::where('slug', $slug)->first();

        //nhiều thể loại
        $theloais = PhimTheLoai::where('id_theloai', $theloai_slug->id)->get();
        $nhieutl = [];
        foreach ($theloais as $key => $tls) {
            $nhieutl[] = $tls->id_phim;
        }
        $phim_tl = Phim::withCount('tapphim')->whereIn('id', $nhieutl)->orderby('ngay_cap_nhat', 'desc')->paginate(20);
        return view('pages.danhmucs.theloai', compact('danhmuc', 'theloai', 'theloai_slug', 'phim_tl', 'phim_moi', 'topview'));
    }

    public function nam_phim($year)
    {
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        $year = $year;
        $nam_phim = Phim::withCount('tapphim')->where('nam', $year)->orderby('ngay_cap_nhat', 'desc')->paginate(20);
        return view('pages.danhmucs.namphim', compact('danhmuc', 'theloai', 'year', 'nam_phim', 'phim_moi', 'topview'));
    }

    public function chi_tiet_phim($slug)
    {
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        $phim_ct = Phim::with('danhmuc', 'theloai', 'the_loais')->where('slug', $slug)->where('status', '1')->first();
        $tap_moinhat = TapPhim::with('phim')->where('id_phim', $phim_ct->id)->orderby('tap', 'desc')->take(1)->first();
        $all_tap = TapPhim::with('phim')->where('id_phim', $phim_ct->id)->orderby('tap', 'desc')->get();

        $luotxem = $phim_ct->luotxem;
        $luotxem = $luotxem + 1;
        $phim_ct->luotxem = $luotxem;
        $phim_ct->save();
        
        $user = Auth::user();
        $ds_yeuthich =[];
        
        if(Auth::check()){
            $ds_yeuthich = YeuThich::with('phim')->with('user')->where('id_user',$user->id)->pluck('id_phim')->toArray();
        }
        
        // dd($ds_yeuthich);
        
        return view('pages.phim.chitietphim', compact('theloai', 'danhmuc', 'phim_ct', 'phim_moi', 'topview', 'tap_moinhat','all_tap','ds_yeuthich'));
    }


    public function xem_phim($slug, $tap)
    {
    
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();
        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();

        $phim = Phim::with('danhmuc', 'theloai', 'the_loais', 'tapphim')->where('slug', $slug)->where('status', '1')->first();
        
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,20);
            $tap = TapPhim::where('id_phim', $phim->id)->where('tap',$tapphim)->first();
        }else{
            $tapphim = 1;
        }
        
        $luotxem = $phim->luotxem;
        $luotxem = $luotxem + 1;
        $phim->luotxem = $luotxem;
        $phim->save();
        $all_tap = TapPhim::with('phim')->where('id_phim', $phim->id)->orderby('tap', 'desc')->get();
        return view('pages.phim.xemphim', compact('danhmuc', 'theloai', 'phim_moi', 'topview', 'phim','tap','tapphim','all_tap'));
    }
    public function so_tap()
    {
        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();
        return view('pages.phim.tapphim', compact('danhmuc', 'theloai'));
    }

    public function timkiem()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
            $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

            $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
            $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();
            // $danhmuc_slug = Danhmuc::where('slug', $slug)->first();

            $phim_dm = Phim::withCount('tapphim')->where('title', 'LIKE', '%' . $search . '%')->orderby('ngay_cap_nhat', 'desc')->paginate(20);

            return view('pages.danhmucs.timkiem', compact('topview', 'phim_moi', 'theloai', 'danhmuc', 'search', 'phim_dm'));
        } else {
            return redirect()->to('/');
        }
    }
}