@extends('adminlte::page')

@section('title', 'Nómina')

@section('content_header')
    <h1>Nómina</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Empleados con menos de 30 días trabajados</h3>
        </div>
        <div class="card-body">
            @if ($empleados->isEmpty())
                <p>No hay empleados con menos de 30 días trabajados.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Días Trabajados</th>
                            <th>Salario</th>
                            <th>Bono de Antigüedad</th>
                            <th>Total Ganado</th>
                            <th>AFP</th>
                            <th>Descuento</th>
                            <th>Líquido Pagable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->nombreCompleto }}</td>
                                <td>{{ $empleado->asistencias->count() }}</td>
                                <td>{{ number_format($empleado->sueldo ?? 0, 2) }}</td>
                                <td>{{ number_format($empleado->bonoAntiguedad ?? 0, 2) }}</td>
                                <td>{{ number_format($empleado->totalGanado ?? 0, 2) }}</td>
                                <td>{{ number_format($empleado->afp ?? 0, 2) }}</td>
                                <td>{{ number_format($empleado->descuento ?? 0, 2) }}</td>
                                <td>{{ number_format($empleado->liquidoPagable ?? 0, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
