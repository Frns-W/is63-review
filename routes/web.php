<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


<<<<<<< HEAD
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
=======
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('nilai', NilaiController::class);

Route::get('/welcome', function () {
    return view('welcome');
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
});

Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Modul Program Studi — 7 route: prodi.index s/d prodi.destroy
    Route::resource('prodi', ProdiController::class);

    // Modul Mahasiswa — 7 route: mahasiswa.index s/d mahasiswa.destroy
    Route::resource('mahasiswa', MahasiswaController::class);

    // Modul Nilai — 7 route: nilai.index s/d nilai.destroy
    Route::resource('nilai', NilaiController::class);

});