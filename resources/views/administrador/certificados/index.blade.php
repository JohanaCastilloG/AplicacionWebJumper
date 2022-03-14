@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Certificados</h1>
@stop

@section('content')


@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

    <div class="container">

        <form action="{{route('admin.certificados.store')}}" method="post" enctype="multipart/form-data">
            @csrf

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Formulario de Solicitudes</div>
                    <div class="card-body">

                        
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>

                                    {{-- {{ Form::text('matricula', null, ['class' => 'form-control']) }} --}}

                                    <select name="solicitud_id" id="solicitud_id" class="form-control">

                                        <option selected disabled>Seleccione una Solicitud</option>
                                        @foreach ($solicitudes as $solicitud)
                                        <option value="{{$solicitud->id}}" >Usuario: {{$solicitud->user->name}} Matricula: {{$solicitud->matricula}}</option>
                                        @endforeach
                                        

                                    </select>


                                </div>
                            </div>

                            <div class="form-group col-md-6">

       

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="file">Subir</span>
                                    </div>
                                    <div class="custom-file">

                                       
                                            <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                            <label class="custom-file-label" for="chooseFile">Seleccionar Archivo</label>
                                    

                                     
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                   
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary float-right">
                            Subir Archivo
                        </button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
    
            <div class="col-md-12">
                <div class="card rounded-lg">
    
                <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Documento</th>
          <th scope="col">Matricula</th>
          <th scope="col">Archivo</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($certificados as $certificado)
        <tr>
          <th scope="row text-center">{{$certificado->id}}</th>
          <td>{{$certificado->solicitud->user->name}}</td> 
          <td>{{$certificado->solicitud->documento}}</td>   
          <td>{{$certificado->solicitud->matricula}}</td> 
          <td>{{$certificado->name}}</td>   
          <td>
          <a href="{{ Storage::url($certificado->file_path)}}" download="{{$certificado->name}}"><i class="fas fa-download"></i></a>
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
