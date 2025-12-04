<?php

namespace App\Http\Controllers;

use App\Models\gambar;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        $gambar = gambar::all();
        return view('upload.index', ['gambar' => $gambar]);
    }
    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);
        $file = $request->file('file');
        $file->move('gambar/', $file->getClientOriginalName());
        gambar::create([
            'file' => $file->getClientOriginalName(),
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/upload');
    }
    public function hapus($id)
    {
        $gambar = gambar::find($id);
        $gambar->delete();
        $file_path = public_path('gambar/' . $gambar->file);
        if (file_exists($file_path)) {
            @unlink($file_path);
        }
        return redirect('/upload');
    }
}
