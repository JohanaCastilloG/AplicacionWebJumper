@extends('layouts.cliente')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @foreach ($certificados as $certificado)

                <div class="card m-4" style="width: 18rem;">
                    <img src="{{ asset('img/Certificados-Online.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Matricula: {{ $certificado->solicitud->matricula }}</h5>
                        <p class="card-text">Nombre de Usuario: {{ $certificado->solicitud->user->name }}</p>
                        <p class="card-text">Documento: {{ $certificado->solicitud->documento }}</p>
                        <p class="card-text">Archivo: {{ $certificado->name }}</p>

                        <a href="{{ Storage::url($certificado->file_path) }}" download="{{ $certificado->name }}"
                            class="btn btn-primary">Descargar</a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>


@endsection
