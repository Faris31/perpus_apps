<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LocationController;

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


    // route manage location
    route::get('lokasi/index', [LocationController::class, 'index'])->name('lokasi.index');
    route::get('lokasi/create', [LocationController::class, 'create'])->name('lokasi.create');
    route::post('lokasi/store', [LocationController::class, 'store'])->name('lokasi.store');
    route::get('lokasi/edit/{id}', [LocationController::class, 'edit'])->name('lokasi.edit');
    route::put('lokasi/update/{id}', [LocationController::class, 'update'])->name('lokasi.update');
    route::delete('lokasi/delete/{id}', [LocationController::class, 'destroy'])->name('lokasi.delete');

    // route manage category
    route::get('kategori/index', [CategoriesController::class, 'index'])->name('kategori.index');
    route::get('kategori/create', [CategoriesController::class, 'create'])->name('kategori.create');
    route::post('kategori/store', [CategoriesController::class, 'store'])->name('kategori.store');
    route::get('kategori/edit/{id}', [CategoriesController::class, 'edit'])->name('kategori.edit');
    route::delete('kategori/delete{id}', [CategoriesController::class, 'destroy'])->name('kategori.delete');
    route::PUT('kategori/update{id}', [CategoriesController::class, 'update'])->name('kategori.update');

    // route manage book
    route::get('buku/index', [BookController::class, 'index'])->name('buku.index');
    route::get('buku/create', [BookController::class, 'create'])->name('buku.create');
    route::post('buku/store', [BookController::class, 'store'])->name('buku.store');
    route::get('buku/edit/{id}', [BookController::class, 'edit'])->name('buku.edit');
    route::delete('buku/delete/{id}', [BookController::class, 'destroy'])->name('buku.delete');
    route::put('buku/update/{id}', [BookController::class, 'update'])->name('buku.update');

    // route transaksi pinjam buku
    Route::resource('transaction', App\Http\Controllers\TransactionController::class);
    Route::get('get-buku/{id}', [App\Http\Controllers\TransactionController::class, 'getBukuByIdCategory']);
    Route::get('print-peminjam/{id}', [\App\Http\Controllers\TransactionController::class, 'print'])->name('print-peminjam');
    Route::post('transaction/{id}/return', [\App\Http\Controllers\TransactionController::class, 'returnBook'])->name('transaction.return');
    // Route::prefix('pengembalian');

    //role manajement
    Route::resource('role', App\Http\Controllers\RoleController::class);
});
