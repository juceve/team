<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <h5 class="mt-2">Nombre</h5>
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre del rol']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h5 class="mt-2">Listado de persmisos</h5>

        {{-- @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id,null, ['class' => 'mr-1']) !!}
                    {{$permission->description}}
                </label>
            </div>
        @endforeach --}}

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
                                    <div class="col-12 col-md-3">
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
                                                                null,
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
                                                                null,
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