@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')
<div class="card">
  <h5 class="card-header">{{$usuario-> name}} {{$usuario-> apellido}}</h5>
  <div class="card-body">
    <h5 class="card-title"> Correo: {{$usuario-> email}}</h5>
    <p class="card-text"> Telefono: {{$usuario-> telefono}}</p>

    {!! Form::model($usuario, ['route' => ['admin.usuarios.update', $usuario], 'method' => 'put']) !!}
    @foreach ($roles as $role)
    <div class="mb-3 form-check">
      {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input']) !!}

      <label class="form-check-label">
        {{ $role->name }}
      </label>
    </div>
    @endforeach
    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

  </div>
</div>
@stop