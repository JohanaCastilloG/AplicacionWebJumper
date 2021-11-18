<div>
    <div class="dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <h5><i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{$count}}</span></h5>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        
            @if ($count)

            <span class="dropdown-item disabled">{{$count}} Notificaciones</span>

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