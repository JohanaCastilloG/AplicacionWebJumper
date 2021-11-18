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
            {!! Form::model ($solicitud, ['route' => ['admin.solicitudes.update', $solicitud],
            'method' => 'PUT']) !!}

            <strong><i class="fas fa-mobile-alt mr-1"></i> Cambiar Estado</strong>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    {{ Form::label('estado', 'Aprobado', ['class'=> 'text-muted']) }} <br>
                    {{ Form::radio('estado', 1, ['class'=> 'form-control']) }}
                </div>
                <div>
                    {{ Form::label('estado', 'Pendiente') }} <br>
                    {{ Form::radio('estado', 2, ['class'=> 'form-control']) }}
                </div>
                <div>
                    {{ Form::label('estado', 'Pago') }} <br>
                    {{ Form::radio('estado', 3, ['class'=> 'form-control']) }}
                </div>
                <div>
                    {{ Form::label('estado', 'Enviado') }} <br>
                    {{ Form::radio('estado', 4, ['class'=> 'form-control']) }}
                </div>
                <div>
                    {{ Form::label('estado', 'Anulado') }} <br>
                    {{ Form::radio('estado', 5, ['class'=> 'form-control']) }}
                </div>
            </div>

            <hr>
                <div>
                    {{ Form::submit('Cambiar',['class'=> 'btn btn-outline-primary']) }} 
                </div>
            
            {!! Form::close() !!}

            <hr>

            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">@switch($solicitud->estado)
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
                </h5>
            </div>


        </div>
        <div class="card-footer text-muted">
        {{$solicitud->created_at->diffForHumans()}} 
        </div>
    </div>
</div>
@stop