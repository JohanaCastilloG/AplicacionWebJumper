<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/ubicacion', function () {
    return view('ubicacion');
})->name('ubicacion');


Route::auth();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/solicitud', SolicitudController::class )->names('solicitud');

Route::get('/solicitudes', [EstadoController::class, 'index'] )->name('solicitudes.index');

Route::get('/solicitudes/{solicitud}', [EstadoController::class, 'show'] )->name('solicitudes.show');
