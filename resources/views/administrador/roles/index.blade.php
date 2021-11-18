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
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($roles as $role)
    <tr>
      <th scope="row text-center">{{$role->id}}</th>
      <td>{{$role->name}}</td>
      
      <td>
      <a href="#"><i class="far fa-eye"></i></a>
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

