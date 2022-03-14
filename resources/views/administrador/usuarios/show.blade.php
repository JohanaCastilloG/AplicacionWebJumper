@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
  <div class="card" style="width: 30rem;">
    <div class="card-header">
        {{$usuario->name}} {{$usuario->apellido}}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Correo: {{$usuario->email}}</li>
      <li class="list-group-item">Telefono: {{$usuario->telefono}}</li>
      <li class="list-group-item">Rol: {{$usuario->roles->pluck('name')->join(' | ')}}</li>
    </ul>
  </div>
@stop

@section('content')

@stop