@extends('layouts.app')

@section('title-page')
    Info Directorio |
@endsection

@section('title-content')
    <i class="fas fa-university"></i> DIRECTORIOS - Detalles
@endsection

@section('css')
    <link href="{{asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet" />
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
                                    <strong>Inicia:</strong>
                                    {{ $directorio->fecinicio }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <strong>Finaliza:</strong>
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
                    </div>
                </div>
                <h2 class="h5">INTEGRANTES</h2 class="h5">
                <div class="row">
                    @if ($integrantes->count() > 0)
                        @foreach ($integrantes as $item)
                            <div class="col-12 col-md-3 ">                             
                                  <div class="border border-warning card" >
                                    <img src="{{Storage::url($item->asociado->user->avatar)}}" class="img-fluid" alt="..." >
                                    <div class="card-body text-center">
                                        <h4 class="mb-0">
                                            {{ $item->asociado->persona->nombres }}
                                            {{ $item->asociado->persona->apellidos }}
                                        </h4>
                                      <p class="card-text text-info">{{ $item->cargo->nombre }}</p>
                                    </div>
                                  </div>
                            </div>
                        @endforeach
                    @else
                        <span>No existen registros</span>
                    @endif




                </div>


            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="{{asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/magnific-popup/meg.init.js')}}"></script>
@endsection