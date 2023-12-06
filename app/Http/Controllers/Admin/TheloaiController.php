<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $danhsach_tl = TheLoai::orderby('id', 'desc')->paginate(7);
        if ($key = request()->key) {
            $danhsach_tl = TheLoai::where('title', 'like', '%' . $key . '%')->paginate(7); //tìm kiếm
        }
        return view('admin.theloai.danhsach_theloai', compact('danhsach_tl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.them_theloai');
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
        $theloai = new TheLoai();
        $theloai->title = $data['title'];
        $theloai->slug = $data['slug'];
        $theloai->desc = $data['desc'];
        $theloai->status = $data['status'];
        $theloai->save();
        return redirect()->route('the-loai.index')->with('message', 'thêm thành công');
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
        $danhsach_tl = TheLoai::where('id', $id)->get();
        return view('admin.theloai.sua_theloai', compact('danhsach_tl'));
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
        $theloai = TheLoai::find($id);
        $theloai->title = $data['title'];
        $theloai->slug = $data['slug'];
        $theloai->desc = $data['desc'];
        $theloai->status = $data['status'];
        $theloai->save();
        return redirect()->route('the-loai.index')->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::findOrFail($id);
        $theloai->delete();
        return redirect()->route('the-loai.index')->with('message', 'xoá thành công');
    }
}