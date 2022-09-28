@extends('layouts.app')

@section('title-page')
    Grados |
@endsection

@section('title-content')
    GRADOS
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grados de asociados') }}
                            </span>

                            @can('grados.create')
                                <div class="float-right">
                                    <a href="{{ route('grados.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>DESCRIPCIÓN</th>
                                        <th>PAGO ÚNICO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grados as $grado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $grado->nombre }}</td>
                                            <td>{{ $grado->descripcion }}</td>
                                            <td>{{ $grado->coste }}</td>

                                            <td align="center">
                                                <form action="{{ route('grados.destroy', $grado->id) }}" method="POST">

                                                    @can('grados.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('grados.edit', $grado->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endcan


                                                    @csrf
                                                    @method('DELETE')
                                                    @can('grados.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
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
