<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PoliController;
use Illuminate\Auth\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin', AdminController::class); 
    Route::resource('pendaftaran', DaftarController::class); 
    Route::resource('poli', PoliController::class); 
});

// Route::middleware(['auth', 'role:dokter'])->group(function () { 
// });

// Route::middleware(['auth', 'role:user'])->group(function () { 
// });

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

// Single role
Route::get('/admin', [AdminController::class, 'admin'])->middleware('role:admin');

// Multiple roles
Route::get('/admin', [DashboardController::class, 'admin'])->middleware('role:admin,dokter');

// Route::get('/', function () {
//     return 'Anda tidak memiliki akses ke halaman ini.';
// })->name('unauthorized');