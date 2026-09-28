<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/nama/{nopal}',function ($nopal) {
    return 'Nama saya: '.$nopal;
});
Route::get('/nim/{param1?}', function ($param1 = '2557301060') {
    return 'NIM saya: '.$param1;
});

