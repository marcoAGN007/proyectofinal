@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Información del Estudiante</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form group">
                <strong>Nombres(s)</strong>
                {{ $student->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form group">
                <strong>Apellidos</strong>
                {{ $student->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form group">
                <strong>Documento de Identidad</strong>
                {{ $student->ci }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form group">
                <strong>Teléfono(s)</strong>
                {{ $student->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form group">
                <strong>Correo electrónico</strong>
                {{ $student->email }}
            </div>
        </div>
    </div>

    <div class="pull-right mb-2">
        <a class="btn btn-secondary" href="{{ route('students.index') }}">Regresar</a>
    </div>
@endsection
