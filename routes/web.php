<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('meja', MejaController::class);
});

Route::middleware(['auth', 'role:admin,waiter'])->group(function(){
    Route::resource('menu', MenuController::class);
});

Route::middleware(['auth', 'role:waiter'])->group(function(){
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pesanan', PesananController::class);
});

Route::middleware(['auth', 'role:waiter,kasir','owner'])->group(function(){
    Route::resource('laporan', LaporanController::class);
});

Route::middleware(['auth', 'role:kasir'])->group(function(){
    Route::resource('transaksi', TransaksiController::class);
});

require __DIR__.'/auth.php';
