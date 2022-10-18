@extends('layouts.app')

@section('title-page')
Editar Evento  |  
@endsection

@section('title-content')
<i class="me-2 mdi mdi-account-multiple"></i> EVENTOS - Editar datos   
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
                                <a href="{{ route('eventos.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('eventos.update', $evento->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('evento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
