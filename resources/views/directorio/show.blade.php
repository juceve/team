@extends('layouts.app')

@section('title-page')
    Info Directorio |
@endsection

@section('title-content')
    <i class="fas fa-university"></i> DIRECTORIOS - Detalles
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    Información de Directorio
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('directorios.index') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <strong>Gestión:</strong>
                                    {{ $directorio->gestion }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    {{ $directorio->status }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <strong>Fecha Inciio:</strong>
                                    {{ $directorio->fecinicio }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <strong>Fecha Final:</strong>
                                    {{ $directorio->fecfin }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                            </div>
                            <div class="col-12 col-md-6">

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Detalles adicionales:</strong><br>
                                    <span>{{ $directorio->observaciones }}</span>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2 class="h5">Integrantes:</h2 class="h5">
                        <ul>
                            @if ($integrantes->count() > 0)
                                @foreach ($integrantes as $item)
                                    <li>
                                        <div class="row">
                                            <div class="col-6 col-md-3">
                                                {{ $item->asociado->persona->nombres }}
                                                {{ $item->asociado->persona->apellidos }}
                                            </div>
                                            <div class="col-6 col-md-3">
                                                {{ $item->cargo->nombre }}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @else
                                <span>No existen registros</span>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
