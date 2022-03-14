@if ($count)
    <div class="alert alert-info alert-dismissible fade show mx-5" role="alert">
        <strong>Notificación!</strong> Tienes {{$count}} solicitudes aprobadas.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    
