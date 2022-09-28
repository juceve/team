@extends('layouts.app')

@section('title-page')
    Información del Asociado |
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> ASOCIADOS - Información
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h5>
                                {{ __('Datos personales') }}
                            </h5>

                            <div class="float-right">
                                <a href="{{ route('asociados.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('asociado.datospersonales')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
