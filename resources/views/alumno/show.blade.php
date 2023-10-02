@extends('layouts.app')

@section('template_title')
    {{ $alumno->name ?? "{{ __('Show') Alumno" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alumno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alumnos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dpi:</strong>
                            {{ $alumno->DPI }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $alumno->NOMBRE }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $alumno->APELLIDO }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $alumno->EMAIL }}
                        </div>
                        <div class="form-group">
                            <strong>Carne:</strong>
                            {{ $alumno->CARNE }}
                        </div>
                        <div class="form-group">
                            <strong>Facultad:</strong>
                            {{ $alumno->FACULTAD }}
                        </div>
                        <div class="form-group">
                            <strong>Ciclo:</strong>
                            {{ $alumno->CICLO }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
