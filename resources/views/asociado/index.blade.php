@extends('layouts.app')

@section('title-page')
    Asociados |
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> ASOCIADOS
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de asociados') }}
                            </span>

                            @can('asociados.create')
                                <div class="float-right">
                                    <a href="{{ route('asociados.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="fas fa-user-plus"></i> {{ __('Nuevo') }}
                                    </a>
                                </div>
                            @endcan

                        </div>
                    </div>
                    {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif --}}

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>NRO.</th>

                                        <th>ASOCIADO</th>
                                        <th>GRADO</th>
                                        <th>ESTADO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asociados as $asociado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $asociado->persona->apellidos . ' ' . $asociado->persona->nombres }}</td>
                                            <td>{{ $asociado->grado->nombre }}</td>
                                            <td>{{ $asociado->estado->nombre }}</td>

                                            <td align="center">

                                                <form class="deleted"
                                                    action="{{ route('asociados.destroy', $asociado->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item "
                                                                href="{{ route('asociados.show', $asociado->id) }}"><i
                                                                    class="fa fa-fw fa-eye text-black-50"></i> Ver info</a>
                                                            @can('asociados.edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('asociados.edit', $asociado->id) }}"><i
                                                                        class="fa fa-fw fa-edit text-black-50"></i> Editar</a>
                                                            @endcan
                                                            @can('vinculos.manage')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('vinculos', $asociado->id) }}">
                                                                    <i class="fas fa-sitemap text-black-50"></i> Vinculos</a>
                                                            @endcan
                                                            @can('users.edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('users.edit', $asociado->user_id) }}">
                                                                    <i class="fas fa-user-circle text-black-50"></i> Usuario</a>
                                                            @endcan
                                                            @can('asociados.destroy')
                                                                <button type="submit" class="dropdown-item" id="deleted"
                                                                    title="Eliminar">
                                                                    <i class="fa fa-fw fa-trash text-black-50"></i>
                                                                    Eliminar</button>
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
                title: 'Eliminar Registro!',
                text: "Esta seguro de realizar la operación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, elimínalo!',
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
