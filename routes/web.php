<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\TestStatus\Risky;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('kegiatans', KegiatanController::class)->middleware('auth');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->middleware('auth');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->middleware('auth')->name('kegiatans.create');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->middleware('auth')->name('kegiatans.store');
Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->middleware('auth')->name('kegiatans.show');
Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->middleware('auth')->name('kegiatans.edit');
Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->middleware('auth')->name('kegiatans.update');
Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->middleware('auth')->name('kegiatans.destroy');
Route::get('/about', function () {
    return view('about');
})->name('about');