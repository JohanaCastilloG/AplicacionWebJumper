@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card" style="width: 50rem;">
                <h5 class="card-header">{{ $usuario->name }} {{ $usuario->apellido }}</h5>
                <div class="card-body">
                    <h5 class="card-title"> Correo: {{ $usuario->email }}</h5>
                    <p class="card-text"> Telefono: {{ $usuario->telefono }}</p>

                    {!! Form::model($usuario, ['route' => ['admin.usuarios.update', $usuario], 'method' => 'put']) !!}

                    <div class="form-group ">
                        {{ Form::label('name', 'Nombre de Usuario') }}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                            </div>
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group ">
                        {{ Form::label('apellido', 'Apellido de Usuario') }}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                            </div>
                            {{ Form::text('apellido', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Correo de Usuario') }}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                            </div>
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('telefono', 'Telefono de Usuario') }}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                            </div>
                            {{ Form::tel('telefono', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    @foreach ($roles as $role)
                        <div class="mb-3 form-check">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input']) !!}

                            <label class="form-check-label">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
@stop
