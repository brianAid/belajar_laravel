<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function input()
    {
        return view('validasi.input');
    }
    public function proses()
    {
        $data = request()->validate([
            'nama' => 'required|min:3|max:20',
            'pekerjaan' => 'required',
            'usia' => 'required|numeric|min:10|max:200',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 20 karakter',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'usia.required' => 'Usia wajib diisi',
            'usia.numeric' => 'Usia harus berupa angka',
            'usia.min' => 'Usia minimal 10 tahun',
            'usia.max' => 'Usia maksimal 200 tahun',
        ]);
        return view('validasi.proses',['data' => $data]);
    }
}
