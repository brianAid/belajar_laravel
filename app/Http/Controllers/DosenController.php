<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $nama = "Brian Adi P";
        return view('dosen.index',[
            'nama' => $nama
        ]);
    }
    public function alamat($alamat)
    {
        return view('dosen.alamat',[
            'alamat' => $alamat
        ]);
    }
}
