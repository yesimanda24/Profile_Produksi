<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Halaman Home (landing page) → home.blade.php
Route::get('/', function () {
    return view('home');
});

// Halaman Dashboard → dashboard.blade.php
Route::get('/dashboard', function () {
    return view('dasboard');
});


// Halaman Tentang → tentang.blade.php
Route::get('/tentang', function () {
    return view('tentang');
});


// Halaman kegiatan → kegiatan.blade.php
Route::get('/kegiatan', function () {
    return view('kegiatan');
});