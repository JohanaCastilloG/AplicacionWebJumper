@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
<h1>Editar Solicitud</h1>
@stop

@section('content')

@if(session('info'))
<div class="alert alert-primary alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    <h5><i class="icon fa fa-pen mr-1"></i> {{ session('info') }}</h5>
</div>
@endif

<div class="container d-flex justify-content-center">
    <div class="card text-center col-md-8">
        <div class="card-header">

            <h5 class="float-left">Solicitud: SC{{$solicitud->id}}</h5>
            
            <a class="btn btn-outline-success float-right" href="{{ route('admin.solicitudes.index') }}" role="button">Voler</a>
        </div>
        
        <div class="card-body">
            
           @switch($solicitud->estado)
                    @case(1)
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">
                            Aprobado
                        </h5>
                    </div>
                    @break
                    @case(2)
                    <div class="alert alert-warning" role="alert">
                        <h5 class="alert-heading">
                            Pendiente
                        </h5>
                    </div>
                    @break
                    @case(3)
                    <div class="alert alert-info" role="alert">
                        <h5 class="alert-heading">
                            Pago
                        </h5>
                    </div>
                    @break
                    @case(4)
                    <div class="alert alert-info" role="alert">
                        <h5 class="alert-heading">
                            Enviado
                        </h5>
                    </div>
                    @break
                    @case(5)
                    <div class="alert alert-secondary" role="alert">
                        <h5 class="alert-heading">
                            Anulado
                        </h5>
                    </div>
                    @break

            @endswitch
                

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

            {!! Form::model ($solicitud, ['route' => ['admin.pendientes.update', $solicitud],
            'method' => 'PUT']) !!}

            <div>
                {{ Form::label('valor', 'Asignar un Valor a Solicitud', ['class'=> 'text-muted']) }} <br>
                {{ Form::number('valor', null, ['class'=> 'form-control', 'placeholder'=>'$', 'required']) }}

            </div>
                

            <hr>
                <div>
                    {{ Form::submit('APROBAR',['class'=> 'btn btn-outline-success']) }} 
                </div>
            
            {!! Form::close() !!}

            <hr>

           


        </div>
        <div class="card-footer text-muted">
        {{$solicitud->created_at->diffForHumans()}} 
        </div>
    </div>
</div>
@stop