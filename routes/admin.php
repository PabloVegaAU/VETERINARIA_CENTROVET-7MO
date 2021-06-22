<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', [HomeController::class,'index']);
Route::get('/Mascotas', [HomeController::class,'mascotas']);
Route::get('/Vacunas', [HomeController::class,'vacunas']);
