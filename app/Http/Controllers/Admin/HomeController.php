<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();

        $aprob = $solicitudes->where('estado', 1)->count();
        $pend = $solicitudes->where('estado', 2)->count();
        $pag = $solicitudes->where('estado', 3)->count();
        $env = $solicitudes->where('estado', 4)->count();
        $anu = $solicitudes->where('estado', 5)->count();

        $datos = compact('aprob', 'pend', 'pag', 'env', 'anu', 'solicitudes');

        return view('administrador.inicio', $datos);
    }
}

