@extends('layouts.app')

@section('title-page')
Editar Asociado  |  
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> ASOCIADOS - Editar datos   
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
                                {{ __('Formulario de Edición') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asociados.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asociados.update', $asociado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('asociado.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-info px-5"><i class="fas fa-save"></i> Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
