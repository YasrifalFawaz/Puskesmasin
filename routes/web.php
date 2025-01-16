<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rute untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('pendaftaran', DaftarController::class);
    Route::resource('poli', PoliController::class);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rute untuk logout
Route::post('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Authentication
Auth::routes();

// Halaman home (untuk semua user)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
