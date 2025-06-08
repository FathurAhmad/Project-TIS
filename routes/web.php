<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [KegiatanController::class, 'index'])->name('home');
    Route::get('/kegiatan/fetch', [KegiatanController::class, 'fetch']);
    Route::get('/kegiatan/{id}', [KegiatanController::class, 'show']);
    Route::post('/kegiatan', [KegiatanController::class, 'store']);
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update']);
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy']);
    Route::get('/about', function () {
        return view('about');
    })->name('about');
});

// Route::middleware('auth')->group(function () {

//     // Dashboard (bisa kamu ganti isinya nanti)
//     Route::get('/dashboard', function () {
//         return redirect('/'); // atau view('dashboard') jika ada
//     })->name('dashboard');

//     // Halaman utama aplikasi kegiatan
//     Route::get('/', [KegiatanController::class, 'index'])->name('home');

//     // API JSON data kegiatan
//     Route::get('/kegiatan/fetch', [KegiatanController::class, 'fetch']);
//     Route::get('/kegiatan/{id}', [KegiatanController::class, 'show']);
//     Route::post('/kegiatan', [KegiatanController::class, 'store']);
//     Route::put('/kegiatan/{id}', [KegiatanController::class, 'update']);
//     Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy']);
// });



Route::get('/about', function () {
    return view('about');
})->name('about');
