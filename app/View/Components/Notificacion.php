<?php

namespace App\View\Components;

use App\Models\Solicitud;
use Illuminate\View\Component;

class Notificacion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $solicitudes = Solicitud::query()->where('user_id', auth()->user()->id)->where('estado', 1);

        $solicitudes = $solicitudes->get();

        $certificados = Solicitud::query()->where('user_id', auth()->user()->id)->has('certificados');

        $certificados = $certificados->get();

        $count = $solicitudes->count() + $certificados->count();

        return view('components.notificacion', compact('solicitudes', 'count', 'certificados'));
    }
}
