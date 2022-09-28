<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('asociado_id') }}
            {{ Form::text('asociado_id', $vinculo->asociado_id, ['class' => 'form-control' . ($errors->has('asociado_id') ? ' is-invalid' : ''), 'placeholder' => 'Asociado Id']) }}
            {!! $errors->first('asociado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persona_id') }}
            {{ Form::text('persona_id', $vinculo->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Persona Id']) }}
            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parentezco_id') }}
            {{ Form::text('parentezco_id', $vinculo->parentezco_id, ['class' => 'form-control' . ($errors->has('parentezco_id') ? ' is-invalid' : ''), 'placeholder' => 'Parentezco Id']) }}
            {!! $errors->first('parentezco_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>