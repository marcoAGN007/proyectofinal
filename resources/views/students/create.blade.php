@extends('adminlte::page')

@section('content')
    <div>
        <div class="pull-left">
            <h2>Ingrese información del Estudiante</h2>
        </div>

        @if ( $errors->any() )
            <div class="alert alert-warning">
                <strong>Error!</strong>
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Nombre(s)</span>
                <input type="text" name="name" class="form-control" placeholder="Ingrese nombre(s)" 
                    aria-label="Name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="description">Apellidos</span>
                <input type="text" name="last_name" class="form-control" placeholder="Ingrese apellidos"
                    aria-label="Last_name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="units">Documento de Identidad</span>
                <input type="text" name="ci" class="form-control" placeholder="Ingrese documento de identidad"
                    aria-label="CI">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="price">Teléfono(s)</span>
                <input type="text" name="phone" class="form-control" placeholder="Ingrese teléfono(s)"
                    aria-label="Phone">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email">Correo Electrónico</span>
                <input type="text" name="email" class="form-control" placeholder="Ingrese correo electrónico"
                    aria-label="Email">
            </div>
            <div>
                <button class="btn btn-success" type="submit">Guardar</button>
                <a class="btn btn-secondary" href="{{ route('students.index') }}">Regresar</a>
            </div>
        </form>
    </div>
@endsection
