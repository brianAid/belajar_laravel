<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = ['nama'];
    public function telepon()
    {
        return $this->hasOne(Telepon::class, 'pengguna_id');
    }
    public function hadiah()
    {
        return $this->belongsToMany(Hadiah::class, 'anggota_hadiah', 'pengguna_id', 'hadiah_id');
    }
}
