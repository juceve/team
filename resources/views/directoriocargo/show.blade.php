@extends('layouts.app')

@section('template_title')
    {{ $directoriocargo->name ?? 'Show Directoriocargo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Directoriocargo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('directoriocargos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Directorio Id:</strong>
                            {{ $directoriocargo->directorio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Asociado Id:</strong>
                            {{ $directoriocargo->asociado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo Id:</strong>
                            {{ $directoriocargo->cargo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $directoriocargo->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
