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
                <div class="form-group">
                    {{ Form::label('observaciones') }}
                    {{ Form::text('observaciones', $directorio->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group d-none">
            {{ Form::label('status') }}
            {{ Form::text('status', $directorio->status ? $directorio->status : 'Activo', ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    
</div>