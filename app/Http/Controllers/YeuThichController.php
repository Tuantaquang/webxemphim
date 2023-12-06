<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Phim;
use App\Models\TapPhim;
use App\Models\TheLoai;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YeuThichController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topview = Phim::where('top_views', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(6)->get();
        $phim_moi = Phim::where('phim_hot', '1')->where('status', '1')->orderby('ngay_cap_nhat', 'desc')->take(10)->get();

        $theloai = TheLoai::where('status', '1')->orderby('id', 'desc')->get();
        $danhmuc = Danhmuc::where('status', '1')->orderby('id', 'desc')->get();
        
        $phim_ct = Phim::withCount('tapphim')->with('danhmuc', 'theloai', 'the_loais')->where('status', '1')->get();
       
        $user = Auth::user();
        $danhsach_yt = YeuThich::with('user')->with('phim')->withCount('tapphim')->where('id_user',$user->id)->orderby('id', 'desc')->paginate(10);
        //đếm phim yêu thích
        $danhsach = YeuThich::with('user')->with('phim')->withCount('tapphim')->where('id_user',$user->id)->first();
        //đếm phim yêu thích
        return view('pages.user.yeuthich',compact('danhmuc', 'theloai', 'danhsach_yt', 'phim_moi', 'topview','phim_ct','danhsach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $yeuthich = new YeuThich();
        $yeuthich ->id_phim = $data['id_phim'];
        $yeuthich ->id_user = $data['id_user'];
        $yeuthich->save();
        return redirect()->route('yeuthich.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        YeuThich::where('id_user', $id)->delete();
        return redirect()->back();
    }
}