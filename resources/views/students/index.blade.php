@extends('adminlte::page')

@section('content')
    <div>
        <div>
            <div class="pull-left">
                <h2>Listado de Estudiantes</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('students.create') }}">Crear</a>
            </div>
        </div>

        @if ( $message = Session::get('success') )
           <div class="alert alert-success">
                <p>{{ $message }}</p>
           </div>
        @endif
        @if ( $message = Session::get('info') )
           <div class="alert alert-info">
                <p>{{ $message }}</p>
           </div>
        @endif
        @if ( $message = Session::get('primary') )
           <div class="alert alert-primary">
                <p>{{ $message }}</p>
           </div>
        @endif
        @if ( $message = Session::get('danger') )
           <div class="alert alert-danger">
                <p>{{ $message }}</p>
           </div>
        @endif

        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Documento de Identidad</th>
                        <th scope="col">Teléfonos</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col" width="280px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->ci }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('students.show', $student) }}">Ver</a>
                                    <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">Editar</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $students->links() !!}
        </div>
    </div>
@endsection
