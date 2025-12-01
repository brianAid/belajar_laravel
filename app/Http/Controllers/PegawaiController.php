<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = DB::table('pegawai')->get();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }
    public function tambah()
    {
        return view('pegawai.tambah');
    }
    public function store(Request $request)
    {
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        return redirect('/pegawai');
    }
    public function edit($id)
    {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->first();
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }
    public function update(Request $request)
    {
        DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);
        return redirect('/pegawai');
    }
    public function hapus($id)
    {
        DB::table('pegawai')->where('pegawai_id', $id)->delete();
        return redirect('/pegawai');
    }
}
