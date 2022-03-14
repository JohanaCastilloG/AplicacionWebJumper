<div>
    <div class="dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <h5><i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">{{$count}}</span></h5>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        
            @if ($count)

            <span class="dropdown-item disabled">{{$count}} Notificaciones</span>

                @foreach ($certificados as $certificado)
                <div class="dropdown-divider"></div>
                <a class="dropdown-item bg-success rounded-lg" href="{{ route('certificados.show', $certificado) }}">
                    <p class="p-2">
                    <i class="fas fa-envelope mr-2"></i>
                    Puedes obtener los certificados de : {{ $certificado->matricula}}.
                    
                    <span class="float-right text-muted text-sm">{{$certificado->updated_at->diffForHumans()}}</span>
                </p>
                </a>
                @endforeach

                @foreach ($solicitudes as $solicitud)
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('solicitudes.show', $solicitud) }}">
                    <p>
                    <i class="fas fa-envelope mr-2"></i>
                    La solicitud con el numero de matricula : {{ $solicitud->matricula}} a sido aprobada.
                    
                    <span class="float-right text-muted text-sm">{{$solicitud->updated_at->diffForHumans()}}</span>
                </p>
                </a>
                @endforeach

                

                <div class="dropdown-divider"></div>
                <a href="{{ route('solicitudes.index') }}" class="dropdown-item dropdown-footer">Ver todas las notificaicones</a>
            @else
                <a class="dropdown-item disabled" href="#">No tiene ninguna notificación.</a>
            @endif                                
        </div>
      </div>
</div>