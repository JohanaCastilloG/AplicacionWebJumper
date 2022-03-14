<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class MispagosController extends Controller
{
    public function index()
    {
        $pagos = Pago::query()->whereRelation('solicitud', 'user_id', auth()->user()->id);

        $pagos = $pagos->get();

        return view('mispagos.index', compact('pagos'));
    }

    public function show(Pago $pago)
    {
        $contenido = json_decode($pago->contenido);

        $respuesta = json_decode($pago->respuesta);

        return view('mispagos.show', compact('pago', 'contenido', 'respuesta'));
    }
}
