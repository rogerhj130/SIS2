@extends('adminlte::page')

@section('title', 'Lista de Empleados')

@section('content_header')
    <h1>Lista de Empleados</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombreCompleto }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->datosLaborales->puesto }}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <a href="{{ route('empleados.historial', $empleado->id) }}" class="btn btn-secondary btn-sm">Historial</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
