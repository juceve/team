@extends('layouts.app')

@section('title-page')
Listado de Usuarios  |  
@endsection

@section('title-content')
USUARIOS REGISTRADOS   
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Listado de usuarios
                            </span>

                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table dataTable ">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>ID</th>
                                        
										<th>NOMBRE</th>
										<th>EMAIL</th>
										<th>ROL</th>
                                        <th width="100px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->pluck('name')[0] }}</td>										

                                            <td class="text-center">
                                               @can('users.edit')
                                                   <a class="btn btn-sm btn-info" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                               @endcan
                                                    
                                                   
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
@endsection