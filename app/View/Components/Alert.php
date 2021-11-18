<?php

namespace App\View\Components;

use App\Models\Solicitud;
use Illuminate\View\Component;

class Alert extends Component
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

        $count = $solicitudes->count();

        return view('components.alert', compact('count'));
    }
}
