<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TapPhim extends Model
{
    
    use HasFactory;
    protected $table = 'tap_phims';
    protected $fillable = [
        'id_phim',
        'link',
        'tap',
    ];

    public function phim()
    {
        return $this->belongsTo(Phim::class, 'id_phim');
    }
}