<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PeminjamanController;


Route::middleware(['auth', 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // peminjaman
    Route::resource('/loan', PeminjamanController::class);


    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('/user', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/weapon', WeaponController::class);
    Route::resource('/pengajuan', PengajuanController::class);
    Route::get('/cetakpengajuan/{id}', [PengajuanController::class, 'export'])->name('export');
});

require __DIR__ . '/auth.php';
