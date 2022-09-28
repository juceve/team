<div>
    @if ($directorio->status != 'Activo')
        @php
            redirect()->route('directorios.index')
            ->with('warning', 'El directorio se encuentra Inactivo');
        @endphp
    @endif
    @section('title-page')
    Integrantes de Directorio  |  
    @endsection
    
    @section('title-content')
    <i class="fas fa-university"></i> DIRECTORIOS - Integrantes   
    @endsection

    <div class="card bg-success">
        <div class="card-body">
            <div class="row text-white">
                <div class="col-12 col-md-4 ">
                    <span><strong>GESTIÓN: </strong>
                        {{ $directorio->gestion }}</span>
                </div>
                <div class="col-12 col-md-4">
                    <span><strong>INICIA: </strong> {{ $directorio->fecinicio }}</span>
                </div>
                <div class="col-12 col-md-4">
                    <span><strong>FINALIZA: </strong> {{ $directorio->fecfin }}</span>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <h2 class="h5 mb-4">Registro de Integrantes</h2>
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Asociado:
                                </label>
                            </div>
                            <div class="col-9 form-group" wire:ignore>
                                <select class="form-select" id="select2" required>
                                    <option value="">-- Seleccione un asociado --</option>
                                    @foreach ($asociados as $asociado)
                                        <option value="{{ $asociado->id }}">{{ $asociado->persona->apellidos . ' ' . $asociado->persona->nombres . ' - ' . $asociado->grado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">
                                    Cargo
                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <select wire:model.defer="cargo_id" class="form-select" required>
                                    <option value="">-- Seleccione un cargo --</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row align-items-center">
                            <div class="col-3 form-group">
                                <label class="form-label">

                                </label>
                            </div>
                            <div class="col-9 form-group">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i>
                                        Adiciona Integrante
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Integrantes Actuales</h2>
                    <div class="table-responsive">
                       
                            <table class="table table-hover">
                                <thead>
                                    <tr class="bg-cyan ">
                                        <th class="text-white">NOMBRE</th>
                                        <th class="text-white">CARGO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($integrantes->count() > 0)
                                        @foreach ($integrantes as $integrante)
                                            <tr>
                                                <td>
                                                    {{ $integrante->asociado->persona->apellidos . ' ' . $integrante->asociado->persona->nombres }}
                                                </td>
                                                <td>
                                                    {{ $integrante->cargo->nombre }}
                                                </td>
                                                <td width="30px">
                                                    <button
                                                        wire:click="delete({{ $integrante->id }})"class="btn btn-outline-warning btn-sm"
                                                        title="Remover"><i class="fas fa-trash-alt"></i></button>

                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2">
                                                <span>No se encontraron registros</span>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
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
    toastr.success("Integrante agregado correctamente");
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
    toastr.error("Integrante eliminado correctamente");
    })
    
</script>
    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('asociado_id', data);
            });
        });
    </script>
@endsection