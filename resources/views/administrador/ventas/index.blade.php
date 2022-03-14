@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1 class="display-3 text-left text-primary">Registro de Ventas</h1>
@stop

@section('content')

    <div class="card float-left p-4 mb-4" style="width: 60rem;">
        <canvas id="myChart"></canvas>
    </div>

    <a class="btn btn-warning float-left mb-4 ml-4" target="_blank" href="{{ route('admin.ventas.pdf') }}"
        role="button">Generar PDF</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Referencia</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Usuario</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
                <tr>
                    <th scope="row">{{ $pago->id }}</th>
                    <td>Dia: {{ date_format($pago->created_at, 'd/m/Y') }} |
                        Hora:{{ date_format($pago->created_at, 'g:i A') }} </td>
                    <td>{{ $pago->referencia }}</td>
                    <td>{{ $pago->solicitud->documento }}</td>
                    <td>
                        <p>Nombre: {{ $pago->solicitud->user->name }} | Email: {{ $pago->solicitud->user->email }}</p>
                    </td>
                    <td>$ {{ number_format($pago->total, 0, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 
            
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var arreglo = {{ Illuminate\Support\Js::from($allpagos) }}

        var totales = [];
        var referencias = [];

        

                for (let x = 0; x < arreglo.length; x++) {
                totales.push(arreglo[x].total);
                referencias.push(arreglo[x].referencia);
                }

        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: referencias,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: totales,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@stop
