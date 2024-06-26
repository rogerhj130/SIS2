@extends('adminlte::page')

@section('title', 'Nómina')

@section('content_header')
    <h1 class="text-center">Nómina</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Empleados con menos de 30 días trabajados</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                        <th>Días Trabajados</th>
                        <th>Bono Antigüedad</th>
                        <th>Total Ganado</th>
                        <th>AFP</th>
                        <th>Líquido Pagable</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->ci }}</td>
                            <td>{{ $empleado->nombreCompleto }}</td>
                            <td>{{ $empleado->sueldo }}</td>
                            <td>{{ $empleado->diasTrabajados ?? 0 }}</td>
                            <td>{{ number_format($empleado->bonoAntiguedad ?? 0, 2) }}</td>
                            <td>{{ number_format($empleado->totalGanado ?? 0, 2) }}</td>
                            <td>{{ number_format($empleado->afp ?? 0, 2) }}</td>
                            <td>{{ number_format($empleado->liquidoPagable ?? 0, 2) }}</td>
                            <td>
                                <form action="{{ route('nomina.generarBoleta', $empleado->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="number" name="descuento" class="form-control col-md-7" placeholder="Descuento" step="0.01" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Boleta de Pago</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
