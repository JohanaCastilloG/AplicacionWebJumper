<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
       $solicitudes = Solicitud::query()->where('user_id', auth()->user()->id);
       $solicitudes = $solicitudes->get();

        return view('estado.index', compact('solicitudes'));
    }

    public function show(Solicitud $solicitud)
    {
        return view('estado.show', compact('solicitud'));
    }
}
