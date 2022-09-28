@extends('layouts.app')

@section('template_title')
    Directoriocargo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Directoriocargo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('directoriocargos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Directorio Id</th>
										<th>Asociado Id</th>
										<th>Cargo Id</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($directoriocargos as $directoriocargo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $directoriocargo->directorio_id }}</td>
											<td>{{ $directoriocargo->asociado_id }}</td>
											<td>{{ $directoriocargo->cargo_id }}</td>
											<td>{{ $directoriocargo->status }}</td>

                                            <td>
                                                <form action="{{ route('directoriocargos.destroy',$directoriocargo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('directoriocargos.show',$directoriocargo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('directoriocargos.edit',$directoriocargo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $directoriocargos->links() !!}
            </div>
        </div>
    </div>
@endsection
