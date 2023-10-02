<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('DPI') }}
            {{ Form::text('DPI', $alumno->DPI, ['class' => 'form-control' . ($errors->has('DPI') ? ' is-invalid' : ''), 'placeholder' => 'Dpi']) }}
            {!! $errors->first('DPI', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NOMBRE') }}
            {{ Form::text('NOMBRE', $alumno->NOMBRE, ['class' => 'form-control' . ($errors->has('NOMBRE') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO') }}
            {{ Form::text('APELLIDO', $alumno->APELLIDO, ['class' => 'form-control' . ($errors->has('APELLIDO') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('APELLIDO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EMAIL') }}
            {{ Form::text('EMAIL', $alumno->EMAIL, ['class' => 'form-control' . ($errors->has('EMAIL') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('EMAIL', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CARNE') }}
            {{ Form::text('CARNE', $alumno->CARNE, ['class' => 'form-control' . ($errors->has('CARNE') ? ' is-invalid' : ''), 'placeholder' => 'Carne']) }}
            {!! $errors->first('CARNE', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FACULTAD') }}
            {{ Form::text('FACULTAD', $alumno->FACULTAD, ['class' => 'form-control' . ($errors->has('FACULTAD') ? ' is-invalid' : ''), 'placeholder' => 'Facultad']) }}
            {!! $errors->first('FACULTAD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CICLO') }}
            {{ Form::text('CICLO', $alumno->CICLO, ['class' => 'form-control' . ($errors->has('CICLO') ? ' is-invalid' : ''), 'placeholder' => 'Ciclo']) }}
            {!! $errors->first('CICLO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>