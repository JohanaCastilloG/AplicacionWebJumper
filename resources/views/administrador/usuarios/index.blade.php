@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

@if(session('info'))
<div class="alert alert-primary alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    <h5><i class="icon fa fa-pen mr-1"></i> {{ session('info') }}</h5>
</div>
@endif

    <div class="container">

        <a class="btn btn-info mb-4" href="{{ route('admin.usuarios.create') }}"
        role="button">Crear un Usuario</a>


        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card rounded-lg">

                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Solicitudes</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <th scope="row text-center">{{ $usuario->id }}</th>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                    <td>{{ $usuario->roles()->pluck('name')->join(', ') }}</td>
                                    <td>{{ $usuario->solicitudes->count() }}</td>

                                    <td>
                                        <a href="{{ route('admin.usuarios.show', $usuario) }}"><i
                                                class="far fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.usuarios.edit', $usuario) }}"><i
                                                class="fas fa-pen"></i></a>
                                    </td>
                                    <td>
                                        <form action={{ route('admin.usuarios.destroy', $usuario) }} class="form-delete"
                                            method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" style="border: none; background-color: transparent;">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El usuario se ha eliminado correctamente.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(form) {
            
            form.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podras revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminalo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

@stop
