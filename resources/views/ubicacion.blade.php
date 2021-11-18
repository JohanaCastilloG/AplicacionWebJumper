@extends('layouts.cliente')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow">


                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=+(jumper%20on%20line)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>

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