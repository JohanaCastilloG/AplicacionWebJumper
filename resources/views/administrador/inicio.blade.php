
@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1  class="display-3 text-left text-primary" >Administrador</h1>
@stop

@section('content')
    <p>Bienvenido al panel de administración.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop