<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;

Route::get('/', function () {
    return view('welcome');
});

//route login
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('login');

// route dashboard
Route::middleware('auth')->group(function () {
    route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index']);
    route::post('logout', [LoginController::class, 'logout']);

    //route manage anggota
    route::get('anggota/index', [AnggotaController::class, 'index']);
    route::post('anggota/store', [\App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota.store');
    route::get('anggota/create', [\App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota.create');
    route::get('anggota/edit/{id}', [\App\Http\Controllers\AnggotaController::class, 'edit'])->name('anggota.edit');
    route::post('anggota/update/{id}', [\App\Http\Controllers\AnggotaController::class, 'update'])->name('anggota.update');
    route::delete('anggota/delete/{id}', [\App\Http\Controllers\AnggotaController::class, 'destroy'])->name('anggota.destroy');
    route::delete('anggota/destroy/{id}', [\App\Http\Controllers\AnggotaController::class, 'softDelete'])->name('anggota.softdelete');
    route::get('anggota/restore', [\App\Http\Controllers\AnggotaController::class, 'indexRestore'])->name('anggota.restore');
    route::get('anggota/restore/{id}', [\App\Http\Controllers\AnggotaController::class, 'restore'])->name('anggota.restore_r');
});
