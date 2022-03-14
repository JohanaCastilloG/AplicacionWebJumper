@extends('layouts.cliente')

@section('content')

<div class="container d-flex justify-content-center">

    <div class="card mr-2 text-center col-md-6">
        <div class="card-header">
            Solicitud: SC{{$pago->id}}
        </div>
        <div class="card-body">

            <strong><i class="far fa-address-card mr-1"></i> Numero de Matricula</strong>

            <p class="text-muted">{{$pago->solicitud->matricula}}</p>

            <hr>

            <strong><i class="far fa-user mr-1"></i>Nombre de Contacto</strong>


            <p class="text-muted">
                {{$contenido->nombre}}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i>Dirección</strong>

            <p class="text-muted"><i class="far fa-building mr-1"></i>{{$contenido->direccion}}</p>

            <hr>

            <strong><i class="fas fa-mobile-alt mr-1"></i> Telefono</strong>

            <p class="text-muted">
                <span class="tag tag-danger">{{$contenido->telefono}}</span>
            </p>

            <hr>

            <strong><i class="fas fa-envelope-open-text mr-1"></i></i> Correo</strong>
            <a href="mailto:JumperOnline@gmail.com">{{$pago->solicitud->user->email}}</a>

            <hr>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">@switch($pago->solicitud->estado)
                    @case(1)
                    Aprobado
                    @break
                    @case(2)
                    Pendiente
                    @break
                    @case(3)
                    Pagado
                    @break
                    @case(4)
                    Enviado
                    @break
                    @case(5)
                    Anulado
                    @break
                    @endswitch
                </h4>
            </div>

           
            <hr>
            <strong><i class="fas fa-file-signature mr-1"></i> Valor Pagado</strong>
 
                <h5 class="tag tag-danger mt-2">$ {{number_format($pago->total, 0, ".", ",")}} COP</h5>


        </div>
        <div class="card-footer text-muted">
        {{$pago->updated_at->diffForHumans()}} 
        <a href="{{route('mispagos.index')}}" class="btn btn-primary float-right">Volver a mis pagos</a>
        </div>
    </div>

    @if (strtoupper($respuesta->firma) == strtoupper($respuesta->firmacreada))

    <div class="card text-center col-md-6">
        <div class="card-header">
            Resumen de la transacción
        </div>
        <div class="card-body">

	<table class="table">
	<tr>
	<td>Estado de la transacción</td>
	<td>
    @switch($respuesta->transactionState)
        @case(4)
            Transacción aprobada
            @break
        @case(6)
            Transacción rechazada
            @break
            @case(104)
            Error
            @break
            @case(7)
            Pago pendiente
            @break
            @case(6)
            Transacción rechazada
            @break
            @case(6)
            Transacción rechazada
            @break
        @default
            $respuesta->mensaje
    @endswitch    
    </td>
	</tr>
	<tr>
	<tr>
	<td>ID de la transacción</td>
	<td>{{$respuesta->transactionId}}</td>
	</tr>
	<tr>
	<td>Referencia de venta</td>
	<td>{{$respuesta->reference_pol}}</td>
	</tr>
	<tr>
	<td>Referencia de la transacción</td>
	<td>{{$respuesta->referenceCode}}</td>
	</tr>
	<tr>
    
    @if ($respuesta->pseBank != null)
    <tr>
		<td>cus </td>
		<td>{{$respuesta->cus}} </td>
		</tr>
		<tr>
		<td>Banco </td>
		<td>{{$respuesta->pseBank}} </td>
	</tr>  
    @endif
	<tr>
	<td>Valor total</td>
	<td>${{number_format($respuesta->TX_VALUE)}}</td>
	</tr>
	<tr>
	<td>Moneda</td>
	<td>{{$respuesta->currency}}</td>
	</tr>
	<tr>
	<td>Entidad:</td>
	<td>{{$respuesta->lapPaymentMethod}}</td>
	</tr>
	</table>
           
        </div>
     
    </div>
 
    @else
        <div class="card text-center col-md-6">
            <h1>Error validando la firma digital.</h1>
        </div>      
    @endif


</div>
@endsection