@extends('layouts.cliente')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-4">

                {!! Form::model($solicitud, ['route' => ['pago.pay', $solicitud], 'method' => 'PUT']) !!}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{ Form::label('nombre', 'Nombre de Contacto') }} <br>
                        {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Contacto', 'required']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('telefono', 'Numero de Teléfono') }} <br>
                        {{ Form::tel('telefono', Auth::user()->telefono, ['class' => 'form-control', 'placeholder' => 'Tu teléfono', 'required']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('direccion', 'Dirección de Contacto') }} <br>
                    {{ Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Calle 123 Ejemplo', 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('direccion2', 'Descripcion de Direccion') }} <br>
                    {{ Form::text('direccion2', null, ['class' => 'form-control', 'placeholder' => 'Apartmento, Color, Piso', 'required']) }}
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{ Form::label('city', 'Ciudad / Municipio') }} <br>
                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Ciudad / Municipio', 'required']) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('departamento', 'Departamento') }} <br>
                        {{ Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento', 'required']) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('postal', 'Codigo Postal') }} <br>
                        {{ Form::text('postal', null, ['class' => 'form-control', 'placeholder' => 'Codigo Postal', 'required']) }}
                    </div>
                </div>
                <hr>
                <h5 class="pb-3">Elegir tipo de Envio</h5>
                <div class="form-row">
                    <div class="form-group col-md-4 text-center">

                        {{ Form::label('envio', 'Envio a Domicilio') }} <br>
                        {{ Form::radio('envio', 'domicilio', ['class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group col-md-4 text-center">

                        {{ Form::label('envio', 'Reclamar en Local') }} <br>
                        {{ Form::radio('envio', 'local', ['class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group col-md-4 text-center">

                        {{ Form::label('envio', 'Subir a plataforma') }} <br>
                        {{ Form::radio('envio', 'plataforma', ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                {{ Form::submit('Ir a Pagar', ['class' => 'btn btn-primary']) }}

                {!! Form::close() !!}

            </div>
        </div>


        <div class="card text-center col-md-3">
            <div class="card-header">
                Solicitud: SC{{$solicitud->id}}
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



                @if ($solicitud->valor)
                <hr>
                <strong><i class="fas fa-hand-holding-usd mr-1"></i> Valor</strong>


                <h5 class="tag tag-danger mt-2 bg-success rounded-lg p-2">$ {{number_format($solicitud->valor, 0, ".", ",")}} COP</h5>

                @endif

            </div>


        </div>
    </div>


    @endsection