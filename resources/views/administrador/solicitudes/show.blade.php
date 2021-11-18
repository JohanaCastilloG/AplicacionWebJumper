@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Solicitud</h1>
@stop

@section('content')
    

<div class="container d-flex justify-content-center">
    <div class="card text-center col-md-8">
        <div class="card-header">
            Solicitud: SC{{$solicitud->id}}
            <a class="btn btn-outline-success  float-right" href="{{ route('admin.solicitudes.index') }}" role="button">Voler</a>
        </div>
        
        <div class="card-body">

            <strong><i class="far fa-address-card mr-1"></i> Numero de Matricula</strong>

            <p class="text-muted">{{$solicitud->matricula}}</p>

            <hr>

            <strong><i class="far fa-user mr-1"></i>Nombre</strong>


            <p class="text-muted">
                {{$solicitud->user->name}} {{$solicitud->user->apellido}}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>

            <p class="text-muted"><i class="far fa-building mr-1"></i>{{$solicitud->ubicacion_predio}}</p>

            <hr>

            <strong><i class="fas fa-mobile-alt mr-1"></i> Telefono</strong>

            <p class="text-muted">
                <span class="tag tag-danger">{{$solicitud->user->telefono}}</span>
            </p>

            <hr>

            <strong><i class="fas fa-envelope-open-text mr-1"></i></i> Correo</strong>
            <a href="mailto:JumperOnline@gmail.com">{{$solicitud->user->email}}</a>

            <hr>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">@switch($solicitud->estado)
                    @case(1)
                    Aprobado
                    @break
                    @case(2)
                    Pendiente
                    @break
                    @case(3)
                    Pago
                    @break
                    @case(4)
                    Enviado
                    @break
                    @case(5)
                    Anulado
                    @break
                    @endswitch
                </h4>
            </div>


        </div>
        <div class="card-footer text-muted">
        {{$solicitud->created_at->diffForHumans()}} 
        </div>
    </div>
</div>
@stop