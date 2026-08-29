<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\JadwalController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/administrasi', [AdministrasiController::class, 'index'])
    ->name('administrasi.index');

    Route::resource('pemasukans', PemasukanController::class);
    Route::resource('pengeluarans', PengeluaranController::class);
    Route::resource('pencatatans', PencatatanController::class);
    Route::resource('jadwals', JadwalController::class);
    Route::resource('wargas', WargaController::class);
    Route::resource('petugas', PetugasController::class)
    ->parameters([
        'petugas' => 'petugas'
    ]);
    Route::resource('fasilitas', FasilitasController::class)
    ->parameters([
        'fasilitas' => 'fasilitas'
    ]);
    Route::resource('kegiatans', KegiatanController::class);

});
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');