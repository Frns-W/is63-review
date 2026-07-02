<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('nilai', NilaiController::class);

Route::get('/welcome', function () {
    return view('welcome');
});
