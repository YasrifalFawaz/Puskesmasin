<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonsulController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('pendaftaran', DaftarController::class);
    Route::resource('poli', PoliController::class);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('user', PasienController::class);
    Route::resource('konsultasi', KonsulController::class);
    Route::resource('riwayat', RiwayatController::class);
});

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Authentication
Auth::routes();

// Halaman home (untuk semua user)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
