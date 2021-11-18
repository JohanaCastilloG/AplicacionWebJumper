@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card rounded-lg">

            <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Rol</th>
      <th scope="col">Solicitudes</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
    <tr>
      <th scope="row text-center">{{$usuario->id}}</th>
      <td>{{$usuario->name}}</td>
      <td>{{$usuario->apellido}}</td>
      <td>{{$usuario->email}}</td>
      <td>{{$usuario->telefono}}</td>
      <td>{{$usuario->roles()-> pluck('name')-> join(', ')}}</td>
      <td>{{$usuario->solicitudes->count()}}</td>
      
      <td>
      <a href="{{route('admin.usuarios.edit', $usuario)}}"><i class="far fa-eye"></i></a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@stop

