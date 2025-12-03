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
}
