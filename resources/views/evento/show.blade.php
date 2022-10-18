@extends('layouts.app')

@section('template_title')
    {{ $evento->name ?? 'Show Evento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Evento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $evento->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $evento->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Tema:</strong>
                            {{ $evento->tema }}
                        </div>
                        <div class="form-group">
                            <strong>Grado Id:</strong>
                            {{ $evento->grado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Asociado Id:</strong>
                            {{ $evento->asociado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Prioridad:</strong>
                            {{ $evento->prioridad }}
                        </div>
                        <div class="form-group">
                            <strong>Ctrasistencia:</strong>
                            {{ $evento->ctrAsistencia }}
                        </div>
                        <div class="form-group">
                            <strong>Notas:</strong>
                            {{ $evento->notas }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
