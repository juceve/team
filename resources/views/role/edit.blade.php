@extends('layouts.app')

@section('title-page')
Editar Rol  |  
@endsection

@section('title-content')
EDITAR ROL   
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong>Datos y Permisos del Rol</strong>
                            </span>
                            {{-- @can('clientes.create') --}}
                            <div class="float-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                            {{-- @endcan --}}

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <h5 class="mt-2">Nombre</h5>
                                        {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del rol']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>




                                    <h5 class="mt-2">Listado de permisos</h5>

                                    @php
                                        $grupo = '';
                                        $indice = 0;
                                    @endphp
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            @if ($grupo != $permission->grupo)
                                                @php
                                                    $grupo = $permission->grupo;
                                                @endphp
                                                @if ($indice > 0)
                                                    </tbody>
                                                    </table>
                                    </div>
                                    @endif
                                    <div class="col-12 col-md-4">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr class="table-warning">
                                                    <th>
                                                        <strong>{{ $permission->grupo }}</strong>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox(
                                                                'permissions[]',
                                                                $permission->id,
                                                                in_array($permission->id, $rolePermissions) ? true : false,
                                                                ['class' => 'mr-1'],
                                                            ) !!}
                                                            {{ $permission->description }}
                                                        </label>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox(
                                                                'permissions[]',
                                                                $permission->id,
                                                                in_array($permission->id, $rolePermissions) ? true : false,
                                                                ['class' => 'mr-1'],
                                                            ) !!}
                                                            {{ $permission->description }}
                                                        </label>
                                                    </td>
                                                </tr>
                                                @endif
                                                @php
                                                    $indice++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
