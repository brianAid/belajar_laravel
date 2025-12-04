<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $table = 'gambars';
    protected $fillable = ['file', 'keterangan'];
}
