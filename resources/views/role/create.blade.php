@extends('layouts.app')

@section('title-page')
Nuevo Rol  |  
@endsection

@section('title-content')
REGISTRO DE ROL   
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
                                <strong>Datos y Permisos del Rol</strong>
                            </span>

                             <div class="float-right">
                                <a href="javascript:history.back()" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}"  role="form" enctype="multipart/form-data">
                           @csrf
                                @include('role.form')
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
