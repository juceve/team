@extends('layouts.app')

@section('template_title')
    {{ $directorio->name ?? 'Show Directorio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Directorio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('directorios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Gestion:</strong>
                            {{ $directorio->gestion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecinicio:</strong>
                            {{ $directorio->fecinicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecfin:</strong>
                            {{ $directorio->fecfin }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $directorio->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $directorio->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
