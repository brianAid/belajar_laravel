<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    protected $table = 'hadiah';
    protected $fillable = ['nama_hadiah'];

    public function pengguna()
    {
        return $this->belongsToMany(Pengguna::class, 'anggota_hadiah', 'hadiah_id', 'pengguna_id');
    }
}
