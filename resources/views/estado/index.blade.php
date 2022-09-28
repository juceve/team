@extends('layouts.app')

@section('title-page')
    Estados |
@endsection

@section('title-content')
    ESTADOS
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Estados') }}
                            </span>

                            @can('estados.create')
                            <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-plus"></i> {{ __('Nuevo') }}
                                </a>
                            </div>
                        @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>NRO</th>
                                        
										<th>NOMBRE</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estados as $estado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estado->nombre }}</td>

                                            <td align="center">
                                                <form action="{{ route('estados.destroy',$estado->id) }}" method="POST">
                                                    @can('estados.edit')
                                                       <a class="btn btn-sm btn-success" href="{{ route('estados.edit',$estado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> 
                                                    @endcan
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('estados.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
@endsection