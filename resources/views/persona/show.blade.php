@extends('layouts.app')

@section('template_title')
    {{ $persona->name ?? 'Show Persona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $persona->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $persona->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $persona->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $persona->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $persona->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $persona->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $persona->email }}
                        </div>
                        <div class="form-group">
                            <strong>Fecnacimiento:</strong>
                            {{ $persona->fecnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Ocupacion:</strong>
                            {{ $persona->ocupacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
