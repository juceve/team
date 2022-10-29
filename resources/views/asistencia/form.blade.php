<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('evento_id') }}
            {{ Form::text('evento_id', $asistencia->evento_id, ['class' => 'form-control' . ($errors->has('evento_id') ? ' is-invalid' : ''), 'placeholder' => 'Evento Id']) }}
            {!! $errors->first('evento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('asociado_id') }}
            {{ Form::text('asociado_id', $asistencia->asociado_id, ['class' => 'form-control' . ($errors->has('asociado_id') ? ' is-invalid' : ''), 'placeholder' => 'Asociado Id']) }}
            {!! $errors->first('asociado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoasistencia') }}
            {{ Form::text('tipoasistencia', $asistencia->tipoasistencia, ['class' => 'form-control' . ($errors->has('tipoasistencia') ? ' is-invalid' : ''), 'placeholder' => 'Tipoasistencia']) }}
            {!! $errors->first('tipoasistencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>