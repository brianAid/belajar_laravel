<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HadiahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\WebController;
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

//Query Builder
Route::prefix('pegawai')->group(callback: function () {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/cari', [PegawaiController::class, 'cari']);
    Route::get('/tambah', [PegawaiController::class, 'tambah']);
    Route::post('/store', [PegawaiController::class, 'store']);
    Route::get('/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('/update', [PegawaiController::class, 'update']);
    Route::get('/hapus/{id}', [PegawaiController::class, 'hapus']);
});
//eloquent
Route::prefix('guru')->group(callback: function () {
    Route::get('/', [GuruController::class, 'index']);
    Route::get('/tambah', [GuruController::class, 'create']);
    Route::post('/store', [GuruController::class, 'store']);
    Route::get('/edit/{id}', [GuruController::class, 'edit']);
    Route::post('/update', [GuruController::class, 'update']);
    Route::get('/hapus/{id}', [GuruController::class, 'destroy']);
    Route::get('/trash', [GuruController::class, 'trashed']);
    Route::post('/restore/{id}', [GuruController::class, 'restore']);
});
//relasi one to one
Route::get('pengguna', [PenggunaController::class, 'index']);
//relasi one to many
Route::get('artikel', [WebController::class, 'index']);
//relasi many to many
Route::get('hadiah', [HadiahController::class, 'index']);
//validasi
Route::get('validasi', [ValidasiController::class, 'input']);
Route::post('validasi/proses', [ValidasiController::class, 'proses']);
//enkripsi dan dekripsi
Route::get('enkripsi', [SkripsiController::class, 'data']);
Route::get('data/{data}', [SkripsiController::class, 'data_proses']);
Auth::routes();
//hash
Route::get('hash', [SkripsiController::class, 'hash']);
//upload
Route::get('upload', [App\Http\Controllers\UploadController::class, 'upload']);
Route::post('upload/proses', [App\Http\Controllers\UploadController::class, 'proses_upload']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
