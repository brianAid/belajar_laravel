<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('blog', [BlogController::class, 'index']);
Route::get('blog/tentang', [BlogController::class, 'tentang']);
Route::get('blog/contact', [BlogController::class, 'kontak']);
Route::get('dosen', [DosenController::class, 'index']);
Route::get('dosen/{alamat}', [DosenController::class, 'alamat']);
Route::get('formulir', [DosenController::class, 'formulir']);
Route::post('formulir/proses', [DosenController::class, 'proses']);
Route::prefix('pegawai')->group(callback: function () {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/tambah', [PegawaiController::class, 'tambah']);
    Route::post('/store', [PegawaiController::class, 'store']);
    Route::get('/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('/update', [PegawaiController::class, 'update']);
    Route::get('/hapus/{id}', [PegawaiController::class, 'hapus']);
});
