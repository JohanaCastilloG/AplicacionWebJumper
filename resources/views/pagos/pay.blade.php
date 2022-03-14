@extends('layouts.cliente')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{asset('img/payu-logo.jpg')}}" alt="">
                </div>

               
                <div class="card mt-4 d-flex align-items-center">
                    <img style="width: 11rem" class="p-4" src="{{asset('img/fraud.svg')}}" alt="">
                    <div class="card-body">
                      
                      <h5>Garantía Antifraude</h5>
                        <p class="card-text">
                        PayU ofrece la Garantía Antifraude que protege a los comercios contra las pérdidas generadas por transacciones fraudulentas.</p>
                    </div>
                </div>


                <div class="card mt-2 p-2">
                    <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                        <input name="merchantId" type="hidden" value="508029">
                        <input name="accountId" type="hidden" value="512321">
                        <input name="description" type="hidden" value="CERTIFICADO {{ $solicitud->matricula }}">
                        <input name="referenceCode" type="hidden" value="{{ $pago->referencia }}">
                        <input name="amount" type="hidden" value="{{ $solicitud->valor }}">
                        <input name="tax" type="hidden" value="0">
                        <input name="taxReturnBase" type="hidden" value="0">
                        <input name="currency" type="hidden" value="COP">
                        <input name="signature" type="hidden" value="{{ $signature }}">
                        <input name="test" type="hidden" value="1">
                        <input name="buyerEmail" type="hidden" value="{{ $solicitud->user->email }}">
                        <input name="responseUrl" type="hidden" value="http://jumperonline.test/pagos/respuesta">
                        <input name="confirmationUrl" type="hidden" value="http://jumperonline.test/pagos/confirmacion">
            
                        @if ($domicilio->envio == 'domicilio')
                            <input name="shippingAddress" type="hidden" value="{{ $domicilio->direccion }}">
                            <input name="shippingCity" type="hidden" value="{{ $domicilio->city }}">
                            <input name="shippingCountry" type="hidden" value="CO">
                        @endif
            
                        <input class="btn btn-success btn-lg btn-block" name="Submit" type="submit" value="PAGAR">
                    </form>
                </div> 
                     
            </div>


            <div class="card text-center col-md-4">
                <div class="card-header">
                    Solicitud: SC{{ $solicitud->id }}
                </div>
                <div class="card-body">

                    <strong><i class="far fa-address-card mr-1"></i> Numero de Matricula</strong>

                    <p class="text-muted">{{ $solicitud->matricula }}</p>

                    <hr>

                    <strong><i class="far fa-user mr-1"></i>Nombre</strong>


                    <p class="text-muted">
                        {{ $solicitud->user->name }} {{ $solicitud->user->apellido }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>

                    <p class="text-muted"><i class="far fa-building mr-1"></i>{{ $solicitud->ubicacion_predio }}</p>

                    <hr>

                    <strong><i class="fas fa-mobile-alt mr-1"></i> Telefono</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">{{ $solicitud->user->telefono }}</span>
                    </p>

                    <hr>

                    <strong><i class="fas fa-envelope-open-text mr-1"></i></i> Correo</strong>
                    <a href="mailto:JumperOnline@gmail.com">{{ $solicitud->user->email }}</a>
                        
                </div>
                <div class="card-footer">
                    <strong><i class="fas fa-hand-holding-usd mr-1"></i> Valor</strong>

                    <h5 class="tag tag-danger mt-2 bg-info rounded-lg p-2 float-end">$
                        {{ number_format($solicitud->valor, 0, '.', ',') }} COP</h5>
                </div>

            </div>
        </div>

        



    @endsection
