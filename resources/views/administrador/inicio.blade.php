@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1 class="display-3 text-left text-primary">Administrador</h1>
@stop

@section('content')

    <div class="card float-left p-5" style="width: 50rem">
        <canvas id="chartAdmin"></canvas>
    </div>

    <div class="card float-left ml-4">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">Cantidad de Solicitudes</li>
            <li class="list-group-item">Aprobado: {{$aprob}}</li>
            <li class="list-group-item">Pendiente: {{$pend}}</li>
            <li class="list-group-item">Pago: {{$pag}}</li>
            <li class="list-group-item">Enviado: {{$env}}</li>
            <li class="list-group-item">Anulado: {{$anu}}</li>
        </ul>
    </div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var aprob = {{ Illuminate\Support\Js::from($aprob) }}
        var pend = {{ Illuminate\Support\Js::from($pend) }}
        var pag = {{ Illuminate\Support\Js::from($pag) }}
        var env = {{ Illuminate\Support\Js::from($env) }}
        var anu = {{ Illuminate\Support\Js::from($anu) }}

        const data = {
            labels: [
                'Aprobado',
                'Pendiente',
                'Pago',
                'Enviado',
                'Anulado'
            ],
            datasets: [{
                label: 'Solicitudes',
                data: [aprob, pend, pag, env, anu],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(6, 212, 95)',
                    'rgb(212, 6, 187)',
                ],
                hoverOffset: 5
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
        };

        const myChart = new Chart(
            document.getElementById('chartAdmin'),
            config
        );
    </script>
@stop
