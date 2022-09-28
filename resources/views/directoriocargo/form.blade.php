<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('directorio_id') }}
            {{ Form::text('directorio_id', $directoriocargo->directorio_id, ['class' => 'form-control' . ($errors->has('directorio_id') ? ' is-invalid' : ''), 'placeholder' => 'Directorio Id']) }}
            {!! $errors->first('directorio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('asociado_id') }}
            {{ Form::text('asociado_id', $directoriocargo->asociado_id, ['class' => 'form-control' . ($errors->has('asociado_id') ? ' is-invalid' : ''), 'placeholder' => 'Asociado Id']) }}
            {!! $errors->first('asociado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargo_id') }}
            {{ Form::text('cargo_id', $directoriocargo->cargo_id, ['class' => 'form-control' . ($errors->has('cargo_id') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Id']) }}
            {!! $errors->first('cargo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $directoriocargo->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>