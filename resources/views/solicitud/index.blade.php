@extends('layouts.cliente')

@section('content')
<div class="container">
    <br>

    <a class="row justify-content-center my-5">
        <img src="{{ asset('img/logojumper.png') }}" alt="logo" style="height: 190px;">
    </a>
    <br></br>
    <div class="row justify-content-center mt-6">

        <div class="col-md-5">
            <a class="btn btn-primary btn-lg btn-block" href="{{route('solicitud.create')}}">Solicitar Certificado</a>
        </div>

        <div class="col-md-5">
            <a class="btn btn-primary btn-lg btn-block" href="{{route('solicitudes.index')}}">Estado de Solicitudes</a>
        </div>
    </div>
</div>
@endsection