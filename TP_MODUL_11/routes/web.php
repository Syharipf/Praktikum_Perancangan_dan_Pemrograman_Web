<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/form', [StudentController::class, 'form'])->name('form');
Route::post('/submit', [StudentController::class, 'submit'])->name('submit');
Route::get('/result', [StudentController::class, 'result'])->name('result');