<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class HadiahController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::with('hadiah')->get();
        return view('anggota.index', ['pengguna' => $pengguna]);   //
    }
}
