@extends('adminlte::page')

@section('title', 'Historial del Empleado')

@section('content_header')
    <h1>Historial del Empleado: <strong>{{ $empleado->nombreCompleto }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Historial</h3>
        </div>
        <div class="card-body">
            @if($historial->isEmpty())
                <p>No hay registros de historial para este empleado.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Acción</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historial as $registro)
                            <tr>
                                <td>{{ $registro->fecha }}</td>
                                <td>{{ $registro->accion }}</td>
                                <td>{{ $registro->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@stop
