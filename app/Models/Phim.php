<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'slug', 'ten_khac', 'desc', 'status', 'id_danhmuc', 'phim_hot', 'phan_giai', 'phu_de', 'ngay_tao', 'ngay_cap_nhat', 'thoi_luong', 'img', 'theloai'];

    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'id_danhmuc');
    }
    public function theloai()
    {
        return $this->belongsTo(TheLoai::class, 'id_theloai');
    }

    public function the_loais()
    {
        return $this->belongsToMany(TheLoai::class, 'phim_the_loai', 'id_phim', 'id_theloai');
    }

    public function danh_mucs()
    {
        return $this->belongsToMany(DanhMuc::class, 'phim__danh_mucs', 'id_phim', 'id_danhmuc');
    }

    public function tapphim(){
        return $this->hasMany(TapPhim::class,'id_phim','id');
    }

    public function yeuthich(){
        return $this->hasMany(YeuThich::class);
    }
}