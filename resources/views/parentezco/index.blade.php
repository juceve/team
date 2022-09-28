@extends('layouts.app')

@section('title-page')
    Parentezcos |
@endsection

@section('title-content')
    PARENTEZCOS
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Parentezcos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('parentezcos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fas fa-plus"></i> {{ __('Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTable">
                                <thead class="thead">
                                    <tr class="table-info">
                                        <th>NRO.</th>
                                        
										<th>NOMBRE</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parentezcos as $parentezco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $parentezco->nombre }}</td>

                                            <td width="200px">
                                                <form action="{{ route('parentezcos.destroy',$parentezco->id) }}" class="deleted"  method="POST">                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('parentezcos.edit',$parentezco->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
            Swal.fire({
                title: 'Eliminar registro',
                text: "Esta seguro de realizar esta operación",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection