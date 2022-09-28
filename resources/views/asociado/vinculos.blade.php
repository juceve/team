@extends('layouts.app')

@section('title-page')
    Vinculos de Asociados |
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> ASOCIADOS - Vinculos Familiares
@endsection

@section('content')
@livewire('vinculos', ['asociado' => $asociado])
@endsection
@section('js')
<script>
    Livewire.on('alertSuccess', function(){
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
    toastr.success("Vinculo agregado correctamente");
    })
    
</script>
<script>
    Livewire.on('alertDanger', function(){
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
    toastr.error("Vinculo eliminado correctamente");
    })
    
</script>
@endsection
