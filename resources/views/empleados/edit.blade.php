@extends('adminlte::page')

@section('title', 'Editar Empleado')

@section('content_header')
    <h1 class="text-center">Editar Empleado</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Código del empleado: <strong>{{ $empleado->id }}</strong></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Datos Personales -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Datos Personales</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombreCompleto">Nombre Completo:</label>
                                    <input type="text" name="nombreCompleto" id="nombreCompleto" class="form-control" value="{{ $empleado->nombreCompleto }}">
                                </div>
                                <div class="form-group">
                                    <label for="ci">Cédula de Identidad:</label>
                                    <input type="text" name="ci" id="ci" class="form-control" value="{{ $empleado->ci }}">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $empleado->telefono }}">
                                </div>
                                <div class="form-group">
                                    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{ $empleado->fechaNacimiento }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $empleado->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $empleado->direccion }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Datos Laborales -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Datos Laborales</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="salario">Salario:</label>
                                    <input type="text" name="salario" id="salario" class="form-control" value="{{ $empleado->datosLaborales->salario }}">
                                </div>
                                <div class="form-group">
                                    <label for="puesto">Puesto:</label>
                                    <input type="text" name="puesto" id="puesto" class="form-control" value="{{ $empleado->datosLaborales->puesto }}">
                                </div>
                                <div class="form-group">
                                    <label for="fechaContratacion">Fecha de Contratación:</label>
                                    <input type="date" name="fechaContratacion" id="fechaContratacion" class="form-control" value="{{ $empleado->datosLaborales->fechaContratacion }}">
                                </div>
                                <div class="form-group">
                                    <label for="fechaSalida">Fecha de Salida:</label>
                                    <input type="date" name="fechaSalida" id="fechaSalida" class="form-control" value="{{ $empleado->datosLaborales->fechaSalida }}">
                                </div>
                                <div class="form-group">
                                    <label for="trabajosAnteriores">Trabajos Anteriores:</label>
                                    <input type="text" name="trabajosAnteriores" id="trabajosAnteriores" class="form-control" value="{{ $empleado->datosLaborales->trabajosAnteriores }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contactos de Emergencia -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contactos de Emergencia</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombreRelacionEmpleado">Nombre del Contacto de Emergencia:</label>
                                    <input type="text" name="nombreRelacionEmpleado" id="nombreRelacionEmpleado" class="form-control" value="{{ $empleado->contactosEmergencia->nombreRelacionEmpleado }}">
                                </div>
                                <div class="form-group">
                                    <label for="numeroEmergenciaFamiliar">Número de Emergencia:</label>
                                    <input type="text" name="numeroEmergenciaFamiliar" id="numeroEmergenciaFamiliar" class="form-control" value="{{ $empleado->contactosEmergencia->numeroEmergenciaFamiliar }}">
                                </div>
                                <div class="form-group">
                                    <label for="direccionEmergencia">Dirección de Emergencia:</label>
                                    <input type="text" name="direccionEmergencia" id="direccionEmergencia" class="form-control" value="{{ $empleado->contactosEmergencia->direccionEmergencia }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
