@extends('layouts.app')

@section('title-page')
    Asociados eliminados |
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> ASOCIADOS - Miembros eliminados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de asociados eliminados') }}
                            </span>
                           

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>NRO.</th>

                                        <th>ASOCIADO</th>
                                        <th>GRADO</th>
                                        <th>FECHA ELIMINACIÓN</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asociados as $asociado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $asociado->persona->apellidos . ' ' . $asociado->persona->nombres }}</td>
                                            <td>{{ $asociado->grado->nombre }}</td>
                                            <td>{{ $asociado->updated_at }}</td>

                                            <td align="center">

                                                <form class="deleted" action="{{ route('asociados.destroy', $asociado->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu">                                                            
                                                            @can('asociados.destroy')
                                                                <button type="submit" id="deleted" class="dropdown-item"title="Restablecer">
                                                                    <i class="far fa-caret-square-up"></i>
                                                                    Restablecer</button>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (session('success') != '')
        {
        <script>
            Swal.fire(
                'Excelente!',
                '{{ session('success') }}',
                'success'
            );
        </script>
        }
    @endif
    <script>
        $('.deleted').submit(function(e) {
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Restablecer Registro!',
                text: "Esta seguro de realizar la operación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, restablecer!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Operación cancelada',
                        'No se modificó ningún registro',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
