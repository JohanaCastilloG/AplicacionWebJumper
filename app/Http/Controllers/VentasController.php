<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentasController extends Controller
{
    public function index()
    {
        $pagos = Pago::orderByRaw('created_at DESC')->get();
        $allpagos = Pago::all();
        return view('administrador.ventas.index', compact('pagos', 'allpagos'));
    }

    public function pdf()
    {
        $pagos = Pago::all();

        $fecha = Carbon::now()->format("F j, Y, g:i a");
        
        $datos = compact('pagos', 'fecha');

        $pdf = PDF::loadView('administrador.ventas.pdf', $datos);
        return $pdf->stream();
    }
}
