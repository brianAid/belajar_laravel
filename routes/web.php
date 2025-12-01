<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('blog', function () {
    return view('blog');
});
Route::get('dosen', [DosenController::class, 'index']);
Route::get('dosen/{alamat}', [DosenController::class, 'alamat']);
