<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Models\Anggota;
use App\Models\Survei;
use App\Models\Kegiatan;
use App\Models\Publikasi;

// ===================== HALAMAN PUBLIK =====================

Route::get('/', function () {
    $kegiatanHome = Kegiatan::where('tampil_di_home', true)
        ->orderBy('tanggal', 'desc')->take(3)->get();
    $publikasiHome = Publikasi::where('tampil_di_home', true)
        ->orderBy('tahun', 'desc')->take(4)->get();
    return view('home', compact('kegiatanHome', 'publikasiHome'));
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/tentang', function () {
    $pimpinan = Anggota::whereNull('tim')->where('aktif', true)->orderBy('urutan')->get();
    $anggotaSDH    = Anggota::where('tim', 'SDH')->where('aktif', true)->orderBy('urutan')->get();
    $anggotaSDMKI  = Anggota::where('tim', 'SDMKI')->where('aktif', true)->orderBy('urutan')->get();
    return view('tentang', compact('pimpinan', 'anggotaSDH', 'anggotaSDMKI'));
});

Route::get('/kegiatan', function () {
    $survei = Survei::where('aktif', true)->orderBy('tanggal_mulai')->get();
    return view('kegiatan', compact('survei'));
});

// ===================== AUTH =====================
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== ADMIN (butuh login) =====================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/',          [AdminController::class, 'dashboard'])->name('dashboard');

    // Anggota
    Route::get('/anggota',              [AdminController::class, 'anggotaIndex'])->name('anggota');
    Route::get('/anggota/tambah',       [AdminController::class, 'anggotaCreate'])->name('anggota.create');
    Route::post('/anggota',             [AdminController::class, 'anggotaStore'])->name('anggota.store');
    Route::get('/anggota/{anggota}/edit', [AdminController::class, 'anggotaEdit'])->name('anggota.edit');
    Route::put('/anggota/{anggota}',    [AdminController::class, 'anggotaUpdate'])->name('anggota.update');
    Route::delete('/anggota/{anggota}', [AdminController::class, 'anggotaDestroy'])->name('anggota.destroy');

    // Survei
    Route::get('/survei',              [AdminController::class, 'surveiIndex'])->name('survei');
    Route::get('/survei/tambah',       [AdminController::class, 'surveiCreate'])->name('survei.create');
    Route::post('/survei',             [AdminController::class, 'surveiStore'])->name('survei.store');
    Route::get('/survei/{survei}/edit', [AdminController::class, 'surveiEdit'])->name('survei.edit');
    Route::put('/survei/{survei}',     [AdminController::class, 'surveiUpdate'])->name('survei.update');
    Route::delete('/survei/{survei}',  [AdminController::class, 'surveiDestroy'])->name('survei.destroy');

    // Kegiatan
    Route::get('/kegiatan',               [AdminController::class, 'kegiatanIndex'])->name('kegiatan');
    Route::get('/kegiatan/tambah',        [AdminController::class, 'kegiatanCreate'])->name('kegiatan.create');
    Route::post('/kegiatan',              [AdminController::class, 'kegiatanStore'])->name('kegiatan.store');
    Route::get('/kegiatan/{kegiatan}/edit', [AdminController::class, 'kegiatanEdit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{kegiatan}',    [AdminController::class, 'kegiatanUpdate'])->name('kegiatan.update');
    Route::delete('/kegiatan/{kegiatan}', [AdminController::class, 'kegiatanDestroy'])->name('kegiatan.destroy');

    // Publikasi
    Route::get('/publikasi',               [AdminController::class, 'publikasiIndex'])->name('publikasi');
    Route::get('/publikasi/tambah',        [AdminController::class, 'publikasiCreate'])->name('publikasi.create');
    Route::post('/publikasi',              [AdminController::class, 'publikasiStore'])->name('publikasi.store');
    Route::get('/publikasi/{publikasi}/edit', [AdminController::class, 'publikasiEdit'])->name('publikasi.edit');
    Route::put('/publikasi/{publikasi}',   [AdminController::class, 'publikasiUpdate'])->name('publikasi.update');
    Route::delete('/publikasi/{publikasi}',[AdminController::class, 'publikasiDestroy'])->name('publikasi.destroy');
});
