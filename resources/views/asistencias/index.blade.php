@extends('adminlte::page')

@section('title', 'Ver Asistencia')

@section('content_header')
    <h1>Ver Asistencia</h1>
@stop

@section('content')
    <form action="{{ route('asistencias.index') }}" method="GET" class="form-inline mb-3">{{-- hice cambios solo aqi --}}
        <div class="form-group">
            <label for="ci" class="mr-2">Número de Carnet:</label>
            <input type="text" name="ci" id="ci" class="form-control mr-2" value="{{ request('ci') }}">
        </div>
        <div class="form-group">
            <label for="fecha" class="mr-2">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control mr-2" value="{{ request('fecha') }}">
        </div>
        <button type="submit" class="btn btn-primary ">Buscar</button>
    </form>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Asistencia</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Empleado</th>
                        <th>CI</th>
                        <th>Hora de Llegada</th>
                        <th>Hora de Salida</th>
                        <th>Fecha</th>
                        {{-- <th>Días Trabajados</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistencias as $asistencia){{-- la variable de index que le pase en compact --}}
                        <tr>
                            {{-- <td>{{ $asistencia->id }}</td> --}}
                            <td>{{ $asistencia->empleado->nombreCompleto }}</td>
                            <td>{{ $asistencia->empleado->ci }}</td>
                            <td>{{ $asistencia->hora_llegada }}</td>
                            <td>{{ $asistencia->hora_salida }}</td>
                            <td>{{ $asistencia->created_at->toDateString() }}</td>
                            {{-- <td>{{ $diasTrabajados[$asistencia->empleado_id] ?? 0 }}</td>  --}}<!-- Mostrar los días trabajados -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

<style>
    .btn-primary:hover {
        background-color: #0056b3;
        color: white;
    }
</style>
