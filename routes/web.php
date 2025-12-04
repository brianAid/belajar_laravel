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
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('blog', [BlogController::class, 'index']);
    Route::get('blog/tentang', [BlogController::class, 'tentang']);
    Route::get('blog/contact', [BlogController::class, 'kontak']);
    Route::get('dosen', [DosenController::class, 'index']);
    Route::get('dosen/{alamat}', [DosenController::class, 'alamat']);
    Route::get('formulir', [DosenController::class, 'formulir']);
    Route::post('formulir/proses', [DosenController::class, 'proses']);
});

//Query Builder
Route::prefix('pegawai')->group(callback: function () {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/cari', [PegawaiController::class, 'cari']);
    Route::get('/tambah', [PegawaiController::class, 'tambah']);
    Route::post('/store', [PegawaiController::class, 'store']);
    Route::get('/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('/update', [PegawaiController::class, 'update']);
    Route::get('/hapus/{id}', [PegawaiController::class, 'hapus']);
    Route::get('/cetak', [PegawaiController::class, 'cetak_pdf']);

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
    Route::get('/export', [GuruController::class, 'export_excel']);
    Route::post('/import_excel', [GuruController::class, 'import_excel']);
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
//hash
Route::get('hash', [SkripsiController::class, 'hash']);
//upload
Route::get('upload', [App\Http\Controllers\UploadController::class, 'upload']);
Route::post('upload/proses', [App\Http\Controllers\UploadController::class, 'proses_upload']);
Route::get('upload/hapus/{id}', [App\Http\Controllers\UploadController::class, 'hapus']);
//session
Route::get('session/buat', [App\Http\Controllers\TesController::class, 'buatSession']);
Route::get('session/tampil', [App\Http\Controllers\TesController::class, 'tampilkanSession']);
Route::get('session/hapus', [App\Http\Controllers\TesController::class, 'hapusSession']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//alert notifikasi
Route::get('pesan', [App\Http\Controllers\NotifController::class, 'index']);
Route::get('pesan/sukses', [App\Http\Controllers\NotifController::class, 'sukses']);
Route::get('pesan/peringatan', [App\Http\Controllers\NotifController::class, 'peringatan']);
Route::get('pesan/gagal', [App\Http\Controllers\NotifController::class, 'gagal']);
//error handling
Route::get('error/{nama}', [App\Http\Controllers\WebController::class, 'error']);
//mail
Route::get('kirim-email', [App\Http\Controllers\emailController::class, 'MailBrian']);

// Auth::routes();
Route::redirect('/dashboard', '/home');
//action url
Route::get('halo', [App\Http\Controllers\HaloController::class, 'panggil']);
Route::get('halo/{nama}', [App\Http\Controllers\HaloController::class, 'halo']);

Auth::routes(['verify' => true]);
Route::get('/form', function () {
    return view('biodata');
});
