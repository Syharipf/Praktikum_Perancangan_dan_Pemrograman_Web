<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rute Halaman Utama
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Rute Proses Tambah Data
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rute Halaman Form Edit
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Rute Proses Update Data
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Rute Hapus Data
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Note: Rute logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
