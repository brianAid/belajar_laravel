<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $guru = Guru::when($cari, function ($query, $cari) {
            return $query->where('nama', 'like', "%{$cari}%")
                         ->orWhere('mapel', 'like', "%{$cari}%");
        })->paginate(15);
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:50',
            'mapel' => 'required|max:50',
            'umur' => 'required|integer|min:20|max:100',
        ]);
        Guru::create($data);
        return redirect('guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required|max:50',
            'mapel' => 'required|max:50',
            'umur' => 'required|integer|min:20|max:100',
        ]);
        $guru = Guru::findOrFail($id);
        $guru->update($data);
        return redirect('guru')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect('guru')->with('success', 'Data guru berhasil dihapus');
    }
}
