@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Solicitudes</h1>
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
      <th scope="col">Matricula</th>
      <th scope="col">Estado</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($solicitudes as $solicitud)
    <tr>
      <th scope="row text-center">{{$solicitud->id}}</th>
      <td>{{$solicitud->user->name}}</td>
      <td>{{$solicitud->matricula}}</td>
      <td>
          @switch($solicitud->estado)
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
      </td>    
      <td>
      <a href="{{route('admin.solicitudes.edit', $solicitud)}}"><i class="fas fa-pen"></i></a>
      </td>
      <td>
      <a href="{{route('admin.solicitudes.show', $solicitud)}}"><i class="far fa-eye"></i></a>
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