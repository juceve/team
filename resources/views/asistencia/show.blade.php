@extends('layouts.app')

@section('title-page')
Asistencias |
@endsection

@section('title-content')
<i class="fas fa-clipboard-list"></i> CONTROL DE ASISTENCIA

@endsection

@section('content')
<p><b>TITULO:</b> {{$evento->tema}}</p>
<p><b>FECHA:</b> {{$evento->fecha}} | <b>HORA: </b>{{$evento->hora}}</p>
@livewire('controlasistencia', ['evento_id' => $evento->id, 'grado_id' => $evento->grado_id])

<!-- Modal -->
<div class="modal fade" id="modalInfoMarcacion" tabindex="-1" aria-labelledby="modalInfoMarcacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">MARCACIÓN - {{$evento->tema}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @livewire('infomarcacion')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
    $('#tablaAsistentes').dataTable({
        
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        order: [[2, 'asc'],[1, 'asc']],
        "pageLength": 50
    });

    Livewire.on('alertSuccess', (message) => {
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.success(message);
    })
    
    function marcar(id,presencial,virtual){
        Livewire.emit("marcar",id,presencial,virtual);
        $('#botones'+id).empty();
        $('#botones'+id).html('<h2 class="h4"> <span class="badge rounded-pill bg-success">PRESENTE</span></h2>');
        $("#radioPresencial"+id).attr('disabled', true);
        $("#radioVirtual"+id).attr('disabled', true);
    }


</script>
@endsection