<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use App\Models\TapPhim;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TapPhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_tapphim = TapPhim::with('phim')->orderby('id', 'desc');
        if ($key = request()->key) {
            $list_tapphim->whereHas('phim', function ($query) use ($key) {
                $query->where('title', 'like', '%' . $key . '%');
            });
        }

        $list_tapphim = $list_tapphim->paginate(7);
        // return response()->json($list_tapphim);
        return view('admin.tapphim.all_tap', compact('list_tapphim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_phim = Phim::orderby('id', 'desc')->pluck('title', 'id');

        return view('admin.tapphim.them_tapphim', compact('list_phim'));
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
        $check_tap = TapPhim::where('id_phim',$data['id_phim'])->where('tap', $data['tapphim'])->count();
        if($check_tap==0){
            $tap = new TapPhim();
            $tap->id_phim = $data['id_phim'];
            $tap->link = $data['linkphim'];
            $tap->tap = $data['tapphim'];
            $tap->save();
        }else{
            return redirect()->back()->with('message', 'tập đã có');
        }
        
        return redirect()->back()->with('message', 'thêm thành công');
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
        $list_tapphim = TapPhim::with('phim')->where('id', $id)->get();

        return view('admin.tapphim.sua_tapphim', compact('list_tapphim'));
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
        $tap = TapPhim::find($id);

        $tap->id_phim = $data['id_phim'];
        $tap->link = $data['linkphim'];
        $tap->tap = $data['tapphim'];

        $tap->save();
        return redirect()->route('tap-phim.index')->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tap_phim = TapPhim::find($id);
        $tap_phim->delete();
        return redirect()->route('tap-phim.index')->with('message', 'xoá thành công');
    }

    public function chon_tapphim()
    {
        $id = $_GET['id'];
        $phim = Phim::find($id);
        if($phim->sotap == '??'){
            $tapcuoi = 999;
        }else{
            $tapcuoi = $phim->sotap;
        }
        
        $output = '<option value="">--chọn tập--</option>';
        
        for ($i = 1; $i <= $tapcuoi; $i++) {
            $output .= '<option value="' . $i . '">' . $i . '</option>';
        }
        echo $output;
    }

    public function ds_tap($id)
    {
        $movie = Phim::find($id);
        $list_tapphim = TapPhim::with('phim')->where('id_phim', $id)->orderby('id', 'desc');
        if ($key = request()->key) {
            $list_tapphim->whereHas('phim', function ($query) use ($key) {
                $query->where('tap', 'like', '%' . $key . '%');
            });
        }

        $list_tapphim = $list_tapphim->paginate(7);
        // return response()->json($list_tapphim);
        return view('admin.tapphim.danhsach_tap', compact('list_tapphim', 'movie'));
    }

    
}