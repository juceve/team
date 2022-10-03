<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('gestión') }}
            {{ Form::number('gestion', $directorio->gestion, ['class' => 'form-control' . ($errors->has('gestion') ? ' is-invalid' : ''), 'placeholder' => 'Año de Gestión']) }}
            {!! $errors->first('gestion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('Inicia') }}
                    {{ Form::date('fecinicio', $directorio->fecinicio, ['class' => 'form-control' . ($errors->has('fecinicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecinicio']) }}
                    {!! $errors->first('fecinicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('Finaliza') }}
                    {{ Form::date('fecfin', $directorio->fecfin, ['class' => 'form-control' . ($errors->has('fecfin') ? ' is-invalid' : ''), 'placeholder' => 'Fecfin']) }}
                    {!! $errors->first('fecfin', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                {{ Form::label('Estado') }}
                {{ Form::hidden('status', $directorio->status ? $directorio->status : null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status', 'id' => 'status']) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                @php
                    $activo = '';
                    $inactivo = '';
                    if ($directorio->status) {
                        if ($directorio->status == 'Activo') {
                            $activo = 'checked';
                        } else {
                            $inactivo = 'checked';
                        }
                    }
                    
                @endphp


                <div class="form-check">
                    <input type="radio" class="form-check-input" id="activo" name="radioStatus" required=""
                        {{ $activo }}>
                    <label class="form-check-label mb-0" for="activo">Activo</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="inactivo" name="radioStatus" required=""
                        {{ $inactivo }}>
                    <label class="form-check-label mb-0" for="inactivo">Inactivo</label>
                </div>
            </div>
            <div class="col-12 ">
                <div class="form-group">
                    {{ Form::label('Detalles adicionales') }}
                    {{ Form::textarea('observaciones', $directorio->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Detalles', 'rows' => '2']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>

</div>
@section('js')
    <script>
        $(document).ready(function() {
            $("#activo").click(function() {
                $('#status').val('Activo');

            });
            $("#inactivo").click(function() {
                $('#status').val('Inactivo');

            });
        });
    </script>
@endsection
