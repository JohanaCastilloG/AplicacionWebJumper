<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class CertificadosController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::query()->where('user_id', auth()->user()->id)->has('certificados');
        $solicitudes = $solicitudes->get();


        return view('certificados.index', compact('solicitudes'));
    }

    public function show(Solicitud $solicitud)
    {
        $certificados = Certificado::query()->where('solicitud_id', $solicitud->id);
        $certificados = $certificados->get();
        return view('certificados.show', compact('solicitud', 'certificados'));
    }
    
}
