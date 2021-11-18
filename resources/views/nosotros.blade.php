@extends('layouts.cliente')

@section('content')
<div class="container">
<hr class="my-3">
<div class="row">
  <div class="col-sm-6">
    <div class="card text-black border-white" style=" --tw-bg-opacity: 0.5;
    background-color: rgba(255, 255, 255, var(--tw-bg-opacity));">
      <div class="card-body">
        <h1 class="card-title text-center">Visión</h1>
        <p class="card-text text-center">Ser una empresa líder en  la generación de Certificados de Tradición y libertad, y en atención al cliente.  Enfocados en las necesidades de la comunidad,  crear productos accesibles y de alta calidad.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-black border-white" style=" --tw-bg-opacity: 0.5;
    background-color: rgba(255, 255, 255, var(--tw-bg-opacity));">
      <div class="card-body">
        <h1 class="card-title text-center">Misión</h1>
        <p class="card-text text-center">Desarrollar e implementar canales alternativos de innovación y mejora para satisfacer las necesidades de nuestros clientes con precios razonables, comodidad y accesibilidad para todos. Ofrecer un óptimo y eficiente servicio a través de nuestro personal capacitado, éticamente orientados y comprometidos con la transformación social y el desarrollo sostenible</p>
      </div>
    </div>
  </div>
</div>


<hr class="my-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contactanos') }}</div>

               
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
            <img src="{{ asset('img/logo jumper.png') }}" alt="logo" height="80px">
              
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" id="inputName" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" id="inputEmail" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputSubject">Subject</label>
              <input type="text" id="inputSubject" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputMessage">Message</label>
              <textarea id="inputMessage" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
          </div>
        </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center">
                  <h3> <i class="fas fa-map-marked-alt mr-1"></i> Información </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-map-marked-alt mr-1"></i>Nombre</strong>

                    <p class="text-muted">
                        Jumper Online
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>

                    <p class="text-muted">Yopal Casanare</p>
                    <p class="text-muted"><i class="far fa-building"></i> Calle 11 N° 21 – 26 </p>
                    <p class="text-muted"><i class="far fa-building"></i> Calle 22 N° 22 – 02 </p>

                    <hr>

                    <strong><i class="fas fa-mobile-alt mr-1"></i> Telefono</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">310 2798710</span>
                    </p>

                    <hr>

                    <strong><i class="fas fa-envelope-open-text mr-1"></i></i> Correo</strong>
                    <a href="mailto:JumperOnline@gmail.com">JumperOnline@gmail.com</a>
                   
                    <hr>

                    <strong><i class="fas fa-user-tie mr-1"></i> NIT</strong>

                    <p class="text-muted">cedula de la empresa</p>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection