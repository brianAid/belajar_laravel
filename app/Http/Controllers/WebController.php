<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $artikel = Articles::with('tags')->get();
        return view('artikel.index', ['artikel' => $artikel]);
    }
    public function error($nama){
        if ($nama == "admin") {
            return "Halo Admin, Selamat Datang di Website Kami";
        }elseif($nama == "user"){
            return abort(403,'anda tidak memiliki akses ke halaman ini');
        } else {
            abort(404);
        }
    }
}
