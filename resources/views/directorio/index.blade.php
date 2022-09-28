@extends('layouts.app')

@section('title-page')
Directorios  |  
@endsection

@section('title-content')
<i class="fas fa-university"></i> DIRECTORIOS   
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Directorio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('directorios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>NRO</th>
                                        
										<th>GESTIÓN</th>
										<th>ESTADO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($directorios as $directorio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $directorio->gestion }}</td>
											<td>{{ $directorio->status }}</td>

                                            <td align="center">

                                                <form class="deleted"
                                                    action="{{ route('directorios.destroy', $directorio->id) }}" method="POST">
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
                                                                href="{{ route('directorios.show', $directorio->id) }}"><i
                                                                    class="fa fa-fw fa-eye text-black-50"></i> Ver info</a>
                                                            @can('directorios.edit')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('directorios.edit', $directorio->id) }}"><i
                                                                        class="fa fa-fw fa-edit text-black-50"></i> Editar</a>
                                                            @endcan
                                                            @can('directorios.integrantes')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('directorio-integrantes', $directorio->id) }}">
                                                                    <i class="fas fa-sitemap text-black-50"></i> Adm. Integrantes</a>
                                                            @endcan
                                                            
                                                            @can('directorios.destroy')
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

    @if (session('warning') != '')
        {
        <script>
            Swal.fire(
                'Alerta!',
                '{{ session('warning') }}',
                'warning'
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