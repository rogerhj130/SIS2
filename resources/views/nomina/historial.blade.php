@extends('adminlte::page')

@section('title', 'Historial de Pagos')

@section('content_header')
    <h1>Historial de Pagos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de sueldos pagados</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Sueldo</th>
                        <th>Deducciones</th>
                        <th>Neto</th>
                        <th>Mes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   {{--  @foreach ($nominas as $nomina)
                        <tr>
                            <td>{{ $nomina->empleado->nombreCompleto }}</td>
                            <td>{{ $nomina->sueldo }}</td>
                            <td>{{ $nomina->deducciones }}</td>
                            <td>{{ $nomina->neto }}</td>
                            <td>{{ $nomina->mes }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Ver</a>
                                <!-- Opciones adicionales -->
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@stop
