<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Grup rute untuk dashboard
Route::prefix('dashboard')->group(function () {
    // Menampilkan daftar berita
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');

    // Menampilkan formulir tambah berita
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');

    // Menyimpan berita baru
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');

    // Menampilkan formulir edit berita
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');

    // Memperbarui berita
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');

    // Menghapus berita
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});
