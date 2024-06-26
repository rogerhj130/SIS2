@extends('adminlte::page')

@section('title', 'Boleta de Pago')

@section('content_header')
    <h1>Boleta de Pago</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Boleta de Pago</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>CI</th>
                    <td>{{ $nomina->empleado->ci }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $nomina->empleado->nombreCompleto }}</td>
                </tr>
                <tr>
                    <th>Salario</th>
                    <td>{{ $nomina->empleado->datosLaborales->salario }}</td>
                </tr>
                <tr>
                    <th>Días Trabajados</th>
                    <td>{{ $nomina->diasTrabajados }}</td>
                </tr>
                <tr>
                    <th>Bono Antigüedad</th>
                    <td>{{ number_format($nomina->bonoAntiguedad, 2) }}</td>
                </tr>
                <tr>
                    <th>Total Ganado</th>
                    <td>{{ number_format($nomina->totalGanado, 2) }}</td>
                </tr>
                <tr>
                    <th>AFP</th>
                    <td>{{ number_format($nomina->afp, 2) }}</td>
                </tr>
                <tr>
                    <th>Descuento</th>
                    <td>{{ number_format($nomina->descuento, 2) }}</td>
                </tr>
                <tr>
                    <th>Líquido Pagable</th>
                    <td>{{ number_format($nomina->liquidoPagable, 2) }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
