<?php

use App\Http\Controllers\Admin\CertificadosController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\SolicitudesPendientesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', [HomeController::class,'index'])->name('admin.inicio');

Route::resource('/usuarios', UserController::class )->names('admin.usuarios');

Route::resource('/roles', RolesController::class )->names('admin.roles');

Route::resource('/todas/solicitud', SolicitudController::class)->names('admin.solicitudes');

Route::resource('/certificados', CertificadosController::class)->names('admin.certificados');


Route::group(['middleware' => ['permission:Empleado|Administrador']], function () {

    Route::resource('/pendientes/solicitud', SolicitudesPendientesController::class)->names('admin.pendientes');

    Route::get('/ventas', [VentasController::class,'index'])->name('admin.ventas');

    Route::get('/ventas/pdf', [VentasController::class,'pdf'])->name('admin.ventas.pdf');

});

