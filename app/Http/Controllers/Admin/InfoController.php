<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Info::orderby('id', 'desc')->paginate(7);
        if ($key = request()->key) {
            $danhsach_dm = Info::where('title', 'like', '%' . $key . '%')->paginate(7); //tìm kiếm
        }
        return view('admin.info-web.info', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info-web.them_info');
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

        $info = new Info();
        $info->title = $data['title'];
        $info->desc = $data['desc'];
        $info->copyright = $data['copyright'];

        $get_image = $request->file('logo');
        if ($get_image) {
            $get_name_img = $get_image->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $image = $name_img . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $path = public_path('upload/logo');
            $get_image->move($path, $image);
            $info->logo = $image;
        }      
        $info->save();
        // dd($info);
             
        return redirect()->route('info.index')->with('message', 'thêm thành công');
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
        $info = Info::where('id', $id)->get();
        return view('admin.info-web.sua_info', compact('info'));
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
        $info = Info::find($id);
        $info->title = $data['title'];
        $info->desc = $data['desc'];
        $info->copyright = $data['copyright'];

        $get_image = $request->file('logo');
        if ($get_image) {
            $existingImage = $info->img;
            if ($existingImage && file_exists(public_path('upload/logo/' . $existingImage))) {
                unlink(public_path('upload/logo/' . $existingImage));
            }else{
                $get_name_img = $get_image->getClientOriginalName();
                $name_img = pathinfo($get_name_img, PATHINFO_FILENAME);
                $extension = $get_image->getClientOriginalExtension();
                $image = $name_img . '_' . uniqid() . '.' . $extension;
                $path = public_path('upload/logo');
                $get_image->move($path, $image);
                $info->logo = $image;
            }
            
        }
        $info->save();
        
        return redirect()->route('info.index')->with('message', 'cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        $imagePath = public_path('upload/logo/' . $info->logo);
        //xoá ảnh
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $info->delete();
        return redirect()->route('info.index')->with('message', 'Xóa thành công');
    }
}