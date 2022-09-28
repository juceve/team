@extends('layouts.app')

@section('title-page')
    Registro de Parentezcos |
@endsection

@section('title-content')
    PARENTEZCOS - Registro
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
                                <a href="{{ route('parentezcos.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-arrow-circle-left"></i> {{ __('Volver') }}
                                </a>
                              </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('parentezcos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('parentezco.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
