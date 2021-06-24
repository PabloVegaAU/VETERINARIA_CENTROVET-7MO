<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\MascotasController;
use App\Http\Controllers\Admin\VacunasController;

Route::get('/', [HomeController::class,'index']);

Route::resource('Users', UsersController::class)->names('admin.users');// editar, ver, eliminar
Route::resource('Clientes', ClientesController::class)->names('admin.clientes');// editar, ver, eliminar
Route::resource('Mascotas', MascotasController::class)->names('admin.mascotas');// editar, ver, eliminar
Route::resource('Vacunas', VacunasController::class)->names('admin.vacunas');// editar, ver, eliminar
