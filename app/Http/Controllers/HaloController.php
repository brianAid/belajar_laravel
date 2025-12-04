<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HaloController extends Controller
{
    public function halo($nama)
    {
        return "Halo " . $nama;

    }
    public function panggil()
    {
        return action([HaloController::class,'halo'], ['nama' => 'Diki']);
    }
}
