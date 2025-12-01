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
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request){
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
}
