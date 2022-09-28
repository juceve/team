@extends('layouts.app')

@section('title-page')
    Editar Usuario |
@endsection

@section('title-content')
    EDITAR PARAMETROS DE USUARIO
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
                                <strong>Datos de usuario</strong>
                            </span>

                            <div class="float-right">
                                <a href="{{route('users.index')}}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put','class' => 'edit'] ) !!}
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="form-group">
                                    {{ Form::label('Nombre Usuario:') }}
                                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'readonly' => '']) }}
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group d-none">
                                    {{ Form::label('email') }}
                                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group d-none">
                                    {{ Form::label('Avatar') }}
                                    {{ Form::text('avatar', $user->avatar, ['class' => 'form-control' . ($errors->has('avatar') ? ' is-invalid' : ''), 'placeholder' => 'Avatar']) }}
                                    {!! $errors->first('avatar', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                            </div>
                        </div>

                        <hr>
                        <h2 class="h5">Asignación de Roles</h2>

                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-primary col-12 col-md-4" id="edit"><i class="fas fa-save"></i> Guardar
                            cambios</button type="submit" class="btn btn-primary">

                    </div>
                    {!! Form::close() !!}

                    <div class="container-fluid">
                        <hr>
                        <form action="{{route('users.resetpass',$user->id)}}" class="reset" method="POST">
                            @csrf
                            <h2 class="h5">
                                Restablecer Contraseña
                            </h2>
                            <button type="button" class="btn btn-info  col-md-4" id="reset"><i class="fas fa-key"></i>
                                Aplicar contraseña genérica</button>
                            <div class="form-group">
                                <small class="text-primary">(Contraseña: 123456)</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(".select2").select2();
    </script>
    @if (session('info') != '')
        {
        <script>
            Swal.fire(
                'Excelente!',
                '{{ session('info') }}',
                'success'
            );
        </script>
        }
    @endif
    <script>
        $('#reset').click(function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Restablecer Constraseña!',
                text: "Esta seguro de realizar la operación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, restablecer!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(".reset").submit();
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

<script>
    $('#edit').click(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Establecer Roles!',
            text: "Esta seguro de realizar la operación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, establecer!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $(".edit").submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación cancelada',
                    'No se realizó ninguna acción',
                    'error'
                )
            }
        })
    });
</script>
@endsection
