<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerpustakaanController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftarbuku', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
Route::get('/buku/{id}', [PerpustakaanController::class, 'showBuku'])->name('perpustakaan.showBuku');
Route::post('/peminjaman', [PerpustakaanController::class, 'createPeminjaman'])->name('perpustakaan.createPeminjaman');
Route::resource('bukus', BukuController::class);
Route::get('perpustakaan/index', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
Route::get('peminjam/create', [PeminjamanController::class, 'create'])->name('peminjam.create');
Route::get('peminjam/index', [PeminjamanController::class, 'index'])->name('peminjam.index');
Route::get('peminjam/edit', [PeminjamanController::class, 'edit'])->name('peminjam.edit');
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('penulis', PenulisController::class);