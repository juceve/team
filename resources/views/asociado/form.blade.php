<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row form-group">
            <h5>Datos personales</h5>
            <hr>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nombres') }}
                    {{ Form::text('nombres', $persona->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'required' => '']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('apellidos') }}
                    {{ Form::text('apellidos', $persona->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('cédula') }}
                    {{ Form::text('cedula', $persona->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'required' => '']) }}
                    {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('dirección') }}
                    {{ Form::text('direccion', $persona->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'required' => '']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('teléfono') }}
                    {{ Form::text('telefono', $persona->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('celular') }}
                    {{ Form::text('celular', $persona->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'required' => '']) }}
                    {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('Correo electrónico') }}
                    {{ Form::email('email', $persona->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required' => '']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('Fecha nacimiento') }}
                    {{ Form::date('fecnacimiento', $persona->fecnacimiento, ['class' => 'form-control' . ($errors->has('fecnacimiento') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('fecnacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('ocupación') }}
                    {{ Form::text('ocupacion', $persona->ocupacion, ['class' => 'form-control' . ($errors->has('ocupacion') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                    {!! $errors->first('ocupacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <h5>Datos complementarios</h5>
        <hr>
        <div class="row form-group">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        Fecha de Ingreso
                    </label>
                    {{ Form::date('fecingreso', !is_null($asociado->fecingreso) ? $asociado->fecingreso : date("Y-m-d"), ['class' => 'form-control' . ($errors->has('fecingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecingreso']) }}
                    {!! $errors->first('fecingreso', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('Grado') }}
                    {{ Form::select('grado_id', $grados, !is_null($asociado->grado_id) ? $asociado->grado_id : null,['class'=>'form-select']); }}
                </div>
            </div>
            
        </div>


        <div class="form-group d-none">
            {{ Form::label('persona_id') }}
            {{ Form::text('persona_id', $asociado->persona_id, ['class' => 'form-control' . ($errors->has('persona_id') ? ' is-invalid' : ''), 'placeholder' => 'Persona Id']) }}
            {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group d-none">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $asociado->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('estado_id', $estados, !is_null($asociado->estado_id) ? $asociado->estado_id : null,['class'=>'form-select']); }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    
</div>
