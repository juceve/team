@extends('layouts.app')

@section('title-page')
Listado de Roles  |  
@endsection

@section('title-content')
ROLES REGISTRADOS   
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong>Listado de Roles</strong>
                            </span>
                            @can('clientes.create')
                                <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-plus-circle"></i>
                                    {{ __('Crear nuevo') }}
                                </a>
                            </div>
                            @endcan
                            
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>NOMBRE</th>

                                        <th width="150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            
											<td>{{ $role->name }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST" class="eliminar">
                                                   @can('roles.edit')
                                                       <a class="btn btn-sm btn-success" href="{{ route('roles.edit',$role->id) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                                   @endcan
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('roles.destroy')
                                                       <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fa fa-fw fa-trash"></i></button> 
                                                    @endcan
                                                    
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
        $(document).ready(function() {
            $('.eliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Esta seguro de eliminar el registro?',
                    text: "El registro eliminado no se podrá recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        });
    </script>
@endsection