<?php

use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/form', [UserInfoController::class, 'create'])->name('user.create');
Route::get('/', [UserInfoController::class, 'index'])->name('user.index');
Route::post('/store', [UserInfoController::class, 'store'])->name('user.store');
Route::get('/show/{id}', [UserInfoController::class, 'show'])->name('user.show');
Route::get('/edit/{id}', [UserInfoController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [UserInfoController::class, 'update'])->name('user.update');
Route::delete('/destroy/{id}', [UserInfoController::class, 'destroy'])->name('user.destroy');