@extends('layouts.app')

@section('title-page')
Registro de Directorio  |  
@endsection

@section('title-content')
<i class="fas fa-university"></i> DIRECTORIOS - Registro   
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Registrar Nuevo Directorio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('directorios.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('directorio.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary px-5"><i class="fas fa-save"></i> Registrar Directorio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
