@extends('layouts.app')

@section('template_title')
    {{ $vinculo->name ?? 'Show Vinculo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Vinculo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vinculos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Asociado Id:</strong>
                            {{ $vinculo->asociado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Persona Id:</strong>
                            {{ $vinculo->persona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Parentezco Id:</strong>
                            {{ $vinculo->parentezco_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
