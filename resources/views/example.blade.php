@extends('layouts.app')

@section('title-page')
Example Page  |  
@endsection

@section('title-content')
Example Page    
@endsection

@section('content')
<div class="card-title">
    Titulo de contenido
</div>
<div class="content">
@livewire('ctrasistencia')  
</div>  
@endsection