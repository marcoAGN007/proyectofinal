@extends('adminlte::page')

@section('content')
    <div>
        <div class="pull-left">
            <h2>Editar información del Estudiante</h2>
        </div>
    </div>
    <div>
        <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Nombre(s)</span>
                <input type="text" name="name" class="form-control" placeholder="Ingrese nombre(s)" aria-label="Name"
                    value="{{ $student->name }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="description">Apellidos</span>
                <input type="text" name="last_name" class="form-control" placeholder="Ingrese apellidos"
                    aria-label="Last_name" value="{{ $student->last_name }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="units">Documento de Identidad</span>
                <input type="number" name="ci" class="form-control" placeholder="Ingrese documento de identidad"
                    aria-label="CI" value="{{ $student->ci }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="price">Teléfono(s)</span>
                <input type="text" name="phone" class="form-control" placeholder="Ingrese teléfono(s)"
                    aria-label="Phone"  value="{{ $student->phone }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email">Correo Electrónico</span>
                <input type="text" name="email" class="form-control" placeholder="Ingrese correo electrónico"
                    aria-label="Email" value="{{ $student->email }}">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a class="btn btn-secondary" href="{{ route('students.index') }}">Regresar</a>
            </div>
        </form>
    </div>
@endsection
