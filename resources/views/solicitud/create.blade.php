@extends('layouts.cliente')

@section('content')
<div class="container">
    <br> </br>
    
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Formulario de Solicitud</div>
                <div class="card-body">
                {!! Form::open(['route' => 'solicitud.store']) !!}
                
               
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            {{ Form::label('documento', 'Documento de Idenfiticacion') }}

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>


    {{ Form::text('documento', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label for="id">Cantidad</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select name="cantidad" id="cantidad" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group col-md-6">
                            {{ Form::label('matricula', 'Numero de matricula') }}

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                                    </div>
                                    {{ Form::text('matricula', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                            {{ Form::label('ubicacion_predio', 'Ubicación del predio') }}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    {{ Form::text('ubicacion_predio', null, ['class'=> 'form-control']) }}
                                   
                                </div>
                            </div>
                            <input type="text" hidden name="user_id" value="{{ auth()->user()->id}}">
                        </div>


                </div>
                <div class="card-footer">
                    {{ Form::submit('Solicitar',['class'=> 'btn btn-primary float-right']) }}
                </div>
                
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
@endsection