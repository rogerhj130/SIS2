@extends('adminlte::page')

@section('title', 'Boleta de Pago')

@section('content_header')
    <h1>Boleta de Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos Personales</h3>
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
                            <th>Cargo</th>
                            <td>{{ $nomina->empleado->datosLaborales->puesto }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de contratacion</th>
                            <td>{{ $nomina->empleado->datosLaborales->fechaContratacion }}</td>
                        </tr>
                        <tr>
                            <th>Salario</th>
                            <td>{{ $nomina->empleado->datosLaborales->salario }} Bs</td>
                        </tr>
                        <tr>
                            <th>Mes</th>
                            <td>{{ \Carbon\Carbon::now()->locale('es')->isoFormat('MMMM YYYY') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detalles de Pago</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Días Trabajados</th>
                            <td>{{ $nomina->diasTrabajados }}</td>
                        </tr>
                        <tr>
                            <th>Bono Antigüedad</th>
                            <td>{{ number_format($nomina->bonoAntiguedad, 2) }} Bs</td>
                        </tr>
                        <tr>
                            <th>Total Ganado</th>
                            <td>{{ number_format($nomina->totalGanado, 2) }} Bs</td>
                        </tr>
                        <tr>
                            <th>AFP</th>
                            <td>{{ number_format($nomina->afp, 2) }} Bs</td>
                        </tr>
                        <tr>
                            <th>Descuento</th>
                            <td>{{ number_format($nomina->descuento, 2) }} Bs</td>
                        </tr>
                        <tr>
                            <th>Líquido Pagable</th>
                            <td><strong>{{ number_format($nomina->liquidoPagable, 2) }} Bs</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
