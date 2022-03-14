<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificado;
use App\Models\Solicitud;
use Illuminate\Http\Request;


class CertificadosController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::where('estado', 3);

        $solicitudes = $solicitudes->get();

        $certificados = Certificado::all();

        return view('administrador.certificados.index', compact('solicitudes', 'certificados'));
    }

    public function store(Request $req)
    {
     
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'solicitud_id' => 'required'
            ]);
    
            $fileModel = new Certificado();
    
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->store('archivos');
                $solicitudid = $req->solicitud_id;
    
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = $filePath;
                $fileModel->solicitud_id = $solicitudid;
                $fileModel->save();
    
                return back()
                ->with('success','¡El archivo se ha subido exitosamente!')
                ->with('file', $fileName);
            }

    }

}
