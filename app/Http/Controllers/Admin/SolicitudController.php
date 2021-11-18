<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();

        return view('administrador.solicitudes.index', compact('solicitudes'));
    }

    public function show(Solicitud $solicitud)
    {
        return view('administrador.solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        return view('administrador.solicitudes.edit', compact('solicitud'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $solicitud->update($request->all());

        return redirect()->route('admin.solicitudes.edit', $solicitud)->with('info', 'Registro actualizado satisfactoriamente');
    }

}
