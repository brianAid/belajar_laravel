<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('blog', [App\Http\Controllers\BlogController::class, 'index']);
Route::get('blog/tentang', [App\Http\Controllers\BlogController::class, 'tentang']);
Route::get('blog/contact', [App\Http\Controllers\BlogController::class, 'kontak']);
Route::get('dosen', [DosenController::class, 'index']);
Route::get('dosen/{alamat}', [DosenController::class, 'alamat']);
Route::get('formulir', [DosenController::class, 'formulir']);
Route::post('formulir/proses', [DosenController::class, 'proses']);
