<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    // public function phim()
    // {
    //     return $this->hasMany(Phim::class);
    // }

    public function phims()
    {
        return $this->belongsTo(Phim::class);
    }
}
