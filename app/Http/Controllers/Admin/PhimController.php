<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use App\Models\Danhmuc;
use App\Models\PhimTheLoai;
use App\Models\TapPhim;
use App\Models\TheLoai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Output\Theme;

class PhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsach_phim = Phim::with('danhmuc','the_loais','theloai')->withCount('tapphim')->orderby('ngay_cap_nhat', 'desc')->paginate(5);
        $list_tl = TheLoai::all();
        ///tim kiếm theo tên phim - ten danh muc - tên thể loại
        if ($key = request()->key) {
            $danhsach_phim = Phim::join('danhmucs', 'phims.id_danhmuc', '=', 'danhmucs.id')
                ->join('the_loais', 'phims.id_theloai', '=', 'the_loais.id')
                ->where(function ($query) use ($key) {
                    $query->where('phims.title', 'like', '%' . $key . '%')
                        ->orWhere('danhmucs.title', 'like', '%' . $key . '%')
                        ->orWhere('the_loais.title', 'like', '%' . $key . '%');
                })->orderby('phims.id', 'desc')->paginate(5);
        }

        $list = Phim::with('danhmuc')->with('theloai')->orderby('id', 'desc')->get();

       
        $path = public_path() . "/json/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . 'phim.json', json_encode($list, JSON_UNESCAPED_UNICODE));

        return view('admin.phim.danhsach_phim', compact('danhsach_phim','list_tl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = Danhmuc::where('status', '1')->get();
        $theloai = TheLoai::where('status', '1')->get();

        return view('admin.phim.them_phim', compact('danhmuc', 'theloai'));
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

        $phim = new Phim();
        $phim->title = $data['title'];
        $phim->slug = $data['slug'];
        $phim->ten_khac = $data['ten_khac'];
        $phim->desc = $data['desc'];
        $phim->status = $data['status'];
        // $phim->id_danhmuc = $data['id_danhmuc'];
        $phim->bo_le = $data['bo_le'];
        $phim->sotap = $data['sotap'];
        // $phim->id_theloai = $data['id_theloai'];
        $phim->phim_hot = $data['phim_hot'];
        $phim->phan_giai = $data['phan_giai'];
        $phim->phu_de = $data['phu_de'];
        $phim->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $phim->ngay_cap_nhat = Carbon::now('Asia/Ho_Chi_Minh');
        $phim->thoi_luong = $data['thoi_luong'];
        $phim->luotxem = rand(1000,999999);
        //$phim->img = $data['img'];
        foreach($data['theloai'] as $tl){
            $phim -> id_theloai = $tl[0];
        }
        foreach($data['danhmuc'] as $dm){
            $phim -> id_danhmuc = $dm[0];
        }

        $get_image = $request->file('img');
        if ($get_image) {
            $get_name_img = $get_image->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $image = $name_img . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $path = public_path('upload/phim');
            $get_image->move($path, $image);
            $phim->img = $image;
            // $phim->save();
            // return redirect()->route('phim.index');
        }      
        $phim->save();
        
        $phim->the_loais()->attach($data['theloai']);
        $phim->danh_mucs()->attach($data['danhmuc']);
        
        return redirect()->route('phim.index')->with('message', 'thêm thành công');
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
        $danhmuc =  Danhmuc::where('status', '1')->get();
        $theloai =  TheLoai::where('status', '1')->get();
        $danhsach_phim = Phim::with('danhmuc', 'theloai','the_loais','danh_mucs')->findOrFail($id);;

        $theloais = $danhsach_phim->the_loais;
        $danhmucs = $danhsach_phim->danh_mucs;
        return view('admin.phim.sua_phim', compact('danhsach_phim', 'danhmuc', 'theloai','theloais','danhmucs'));
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
        $data = $request->all();
        $phim = Phim::find($id);
        $phim->title = $data['title'];
        $phim->slug = $data['slug'];
        $phim->ten_khac = $data['ten_khac'];
        $phim->desc = $data['desc'];
        $phim->status = $data['status'];
        // $phim->id_danhmuc = $data['id_danhmuc'];
        $phim->bo_le = $data['bo_le'];
        $phim->sotap = $data['sotap'];
        $phim->phim_hot = $data['phim_hot'];
        $phim->phan_giai = $data['phan_giai'];
        $phim->phu_de = $data['phu_de'];
        $phim->thoi_luong = $data['thoi_luong'];
        // $phim->luotxem = rand(1000,999999);

        $phim->ngay_cap_nhat = Carbon::now('Asia/Ho_Chi_Minh');
        //$phim->img = $data['img'];

        $get_image = $request->file('img');
        if ($get_image) {
            $existingImage = $phim->img;
            if ($existingImage && file_exists(public_path('upload/phim/' . $existingImage))) {
                unlink(public_path('upload/phim/' . $existingImage));
            }else{
                $get_name_img = $get_image->getClientOriginalName();
                $name_img = pathinfo($get_name_img, PATHINFO_FILENAME);
                $extension = $get_image->getClientOriginalExtension();
                $image = $name_img . '_' . uniqid() . '.' . $extension;
                $path = public_path('upload/phim');
                $get_image->move($path, $image);
                $phim->img = $image;
            }
            
        }
        foreach($data['theloai'] as $tl){
            $phim -> id_theloai = $tl[0];
        }
        foreach($data['danhmuc'] as $dm){
            $phim -> id_theloai = $dm[0];
        }
        $phim->save();

        $phim->the_loais()->sync($data['theloai']);
        $phim->danh_mucs()->sync($data['danhmuc']);
        
        return redirect()->route('phim.index')->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phim = Phim::findOrFail($id);
        $imagePath = public_path('upload/phim/' . $phim->img);
        //xoá ảnh
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        //xoá nhiều thể loại
        PhimTheLoai::whereIn('id_phim',[$phim->id])->delete();
        //xoá tập phim
        TapPhim::whereIn('id_phim',[$phim->id])->delete();
        $phim->delete();
        return redirect()->route('phim.index')->with('message', 'Xóa thành công');
    }

    public function update_year(Request $request)
    {
        $data = $request->all();
        $phim = Phim::find($data['id_phim']);
        $phim->nam = $data['year'];
        $phim->save();
    }

    public function update_topviews(Request $request)
    {
        $data = $request->all();
        $phim = Phim::find($data['id_phim']);
        $phim->top_views = $data['top_views'];
        $phim->save();
    }
}