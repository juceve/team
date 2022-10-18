<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $evento->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora') }}
            {{ Form::time('hora', $evento->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('tema', $evento->tema, ['class' => 'form-control' . ($errors->has('tema') ? ' is-invalid' : ''), 'placeholder' => 'Tema']) }}
            {!! $errors->first('tema', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Grado de Participacion') }}
            <br>
            {{ Form::select('grado_id', $grados, $evento->grado_id, array('class'=>'select2',"style" => "width:100%;")) }}            
            {!! $errors->first('grado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Responsable') }}
            <br>
            <select name="asociado_id" id="asociado_id" class="select2" style="width: 100%">
                @foreach ($asociados as $asociado)
                    @php $sel = '';if($asociado->id == $evento->asociado_id){$sel="selected";} @endphp
                   <option value="{{$asociado->id}}" {{$sel}}>{{$asociado->persona->apellidos . ' ' . $asociado->persona->nombres}}</option> 
                @endforeach            
            </select>             
            {!! $errors->first('asociado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prioridad') }}
            <br>
            {!! Form::select('prioridad', ['baja' => 'Baja', 'normal' => 'Normal', 'alta' => 'Alta'], $evento->prioridad,array('class'=>'select2',"style" => "width:100%;")) !!}
            {!! $errors->first('prioridad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ctrAsistencia') }} <br>
            {!! Form::select('ctrAsistencia', ['on' => 'SI', '' => 'NO'], $evento->ctrAsistencia,array('class'=>'select2',"style" => "width:100%;")) !!}            
            {!! $errors->first('ctrAsistencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('notas') }}
            {{ Form::text('notas', $evento->notas, ['class' => 'form-control' . ($errors->has('notas') ? ' is-invalid' : ''), 'placeholder' => 'Notas']) }}
            {!! $errors->first('notas', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a href="{{route('eventos.index')}}" class="btn btn-secondary" >Cancelar</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar cambios</button>
    </div>
</div>