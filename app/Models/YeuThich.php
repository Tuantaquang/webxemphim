<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;

    public function phim(){
        return $this->belongsTo(Phim::class,'id_phim');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function tapphim(){
        return $this->hasMany(TapPhim::class,'id_phim','id_phim');
    }
}