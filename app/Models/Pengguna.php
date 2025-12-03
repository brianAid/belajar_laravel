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
}
