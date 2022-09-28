@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name ?? 'Show User' }}
@endsection
@section('title-page')
    Mi Perfil |
@endsection

@section('title-content')
    Mi Perfil
@endsection
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong>DATOS PERSONALES</strong>
                            </span>
                            {{-- @can('clientes.create') --}}
                            <div class="float-right">
                                <a href="javascript:history.back();" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                            {{-- @endcan --}}

                        </div>
                    </div>

                    <div class="card-body">
                                                
                        @include('asociado.datospersonales')
                       <h5 class="mt-4 text-center" >DATOS DEL USUARIO DE SISTEMA</h5>
                       <hr>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    <strong>Nombre:</strong>
                                </td>
                                <td>
                                    {{ Auth::user()->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Email:</strong>
                                </td>
                                <td>
                                    {{ Auth::user()->email }}
                                </td>
                            </tr>
                           
                            <tr>
                                <td>
                                    <strong>Tipo de usuario:</strong>
                                </td>
                                <td>
                                    {{ Auth::user()->roles->pluck('name')[0] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Cambiar imagen:</strong>
                                </td>
                                <td>
                                    @livewire('uploadpics')
                                </td>
                            </tr>
                        </table>
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
