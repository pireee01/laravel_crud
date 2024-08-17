<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrediksiNamaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('login', [AuthController::class, 'login'])->name('login-post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');

Route::get('/prediksi-nama', [PrediksiNamaController::class, 'index'])->name('prediksi-nama.index');
Route::get('/prediksi-nama/create', [PrediksiNamaController::class, 'create'])->name('prediksi-nama.create'); 
Route::post('/prediksi-nama/store', [PrediksiNamaController::class, 'store'])->name('prediksi-nama.store');
Route::get('/prediksi-nama/edit/{prediksi_nama}', [PrediksiNamaController::class, 'edit'])->name('prediksi-nama.edit');
Route::put('/prediksi-nama/update/{prediksi_nama}', [PrediksiNamaController::class, 'update'])->name('prediksi-nama.update');
Route::delete('/prediksi-nama/destroy/{prediksi_nama}', [PrediksiNamaController::class, 'destroy'])->name('prediksi-nama.destroy');