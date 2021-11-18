<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', [HomeController::class,'index'])->name('admin.inicio');

Route::resource('/usuarios', UserController::class )->names('admin.usuarios');

Route::resource('/roles', RolesController::class )->names('admin.roles');

Route::resource('/solicitud', SolicitudController::class)->names('admin.solicitudes');

