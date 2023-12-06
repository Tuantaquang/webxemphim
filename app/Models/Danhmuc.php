<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'status',
        'slug',
    ];

    public function phim()
    {
        return $this->hasMany(Phim::class,'id_danhmuc')->orderby('id','desc');
    }

    public function phims()
    {
        return $this->belongsTo(Phim::class);
    }
}