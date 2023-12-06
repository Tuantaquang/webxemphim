<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Danhmuc;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $danhsach_dm = Danhmuc::orderby('posion', 'asc')->paginate(7);
        if ($key = request()->key) {
            $danhsach_dm = Danhmuc::where('title', 'like', '%' . $key . '%')->paginate(7); //tìm kiếm
        }
        return view('admin.danhmuc.danhsach_danhmuc', compact('danhsach_dm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuc.them_danhmuc');
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
        $danhmuc = new Danhmuc();
        $danhmuc->title = $data['title'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->desc = $data['desc'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
        return redirect()->route('danh-muc.index')->with('message', 'thêm thành công');
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
        $danhsach_dm = Danhmuc::where('id', $id)->get();
        return view('admin.danhmuc.sua_danhmuc', compact('danhsach_dm'));
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
        $danhmuc = Danhmuc::find($id);
        $danhmuc->title = $data['title'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->desc = $data['desc'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
        return redirect()->route('danh-muc.index')->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc = Danhmuc::findOrFail($id);
        $danhmuc->delete();
        return redirect()->route('danh-muc.index')->with('message', 'xoá thành công');
    }

    public function resorting(Request $request)
    {
        $data = $request->all();

        foreach($data['array_id'] as $key => $value){
            $danhmuc = Danhmuc::find($value);
            $danhmuc->posion = $key;
            $danhmuc->save();
        }
    }
}