<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload.index');
    }
    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'gambar_file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);
        $file = $request->file('gambar_file');
        $file->move('gambar/', $file->getClientOriginalName());

        return "<img src='/gambar/" . $file->getClientOriginalName() . "' width='300px'>";
    }
}
