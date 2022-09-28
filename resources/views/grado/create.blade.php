@extends('layouts.app')

@section('title-page')
    Registro de Grados |
@endsection

@section('title-content')
    GRADOS - Registro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Formulario de Registro') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('grados.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                </a>
                              </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grado.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary px-5"><i class="fas fa-save"></i> Registrar Grado</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
