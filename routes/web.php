<?php

use App\Http\Controllers\CertificadosController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MispagosController;
use App\Http\Controllers\PagosController;
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

Route::get('/miscertificados', [CertificadosController::class, 'index'] )->name('certificados.index');

Route::get('/miscertificados/{solicitud}', [CertificadosController::class, 'show'] )->name('certificados.show');

Route::get('/solicitudes/{solicitud}', [EstadoController::class, 'show'] )->name('solicitudes.show');

Route::put('/pagar/{solicitud}', [PagosController::class, 'pay'] )->name('pago.pay');

Route::get('/formulariopago/{solicitud}', [PagosController::class, 'formPay'] )->name('pago.formpay');

Route::get('/pagos/respuesta', [PagosController::class, 'respuesta'] )->name('pago.respuesta');

Route::get('/mispagos', [MispagosController::class, 'index'])->name('mispagos.index');

Route::get('/mispagos/{pago}', [MispagosController::class, 'show'])->name('mispagos.show');
