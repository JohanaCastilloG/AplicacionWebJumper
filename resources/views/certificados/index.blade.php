@extends('layouts.cliente')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        @foreach ($solicitudes as $solicitud)

            <div class="card m-4" style="width: 18rem;">
                <img src="{{ asset('img/lupa-pen.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Matricula: {{ $solicitud->matricula }}</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $solicitud->matricula }}
                          
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $solicitud->ubicacion_predio }}
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Documentos/Certificados
                          <span class="badge badge-primary badge-pill"><i class="fas fa-check"></i></span>
                        </li>
                      </ul>

                    <a href="{{ route('certificados.show', $solicitud) }}" class="btn btn-primary d-flex justify-content-between align-items-center mt-3">Ver Certificados<i
                        class="far fa-eye"></i></a>
                </div>
            </div>

        @endforeach

    </div>
</div>


@endsection
