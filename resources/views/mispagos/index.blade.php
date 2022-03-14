@extends('layouts.cliente')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card rounded-lg">

                    <table class="table">
                        <thead class="thead bg-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Solicitud</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td scope="row text-center">{{ $pago->id }}</td>
                                    
                                    <td>
                                        <div>
                                            Matricula: {{ $pago->solicitud->matricula }}
                                        </div>
                                        <div>
                                            Documento: {{ $pago->solicitud->documento }}
                                        </div>
                                    </td>
                                    <td>@switch($pago->solicitud->estado)
                                        @case(1)
                                        Aprobado
                                        @break
                                        @case(2)
                                        Pendiente
                                        @break
                                        @case(3)
                                        Pagado
                                        @break
                                        @case(4)
                                        Enviado
                                        @break
                                        @case(5)
                                        Anulado
                                        @break
                                        @endswitch</td>
                                    <td>{{ $pago->total }}</td>
                                    <td>
                                        <a href="{{ route('mispagos.show', $pago) }}"><i
                                                class="far fa-eye"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
