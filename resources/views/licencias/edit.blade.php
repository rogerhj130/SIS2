@extends('adminlte::page')

@section('title', 'Editar Licencia')

@section('content_header')
    <h1>Licencia</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Licencia</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('licencias.update', $licencia) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="empleado_id">Empleado:</label>
                            <select name="empleado_id" id="empleado_id" class="form-control" required>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->id }}"{{ $licencia->empleado_id == $empleado->id ? ' selected' : '' }}>{{ $empleado->nombreCompleto }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="tipo">Tipo de Licencia:</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="enfermedad"{{ $licencia->tipo == 'enfermedad' ? ' selected' : '' }}>Enfermedad</option>
                                <option value="vacaciones"{{ $licencia->tipo == 'vacaciones' ? ' selected' : '' }}>Vacaciones</option>
                                <option value="personal"{{ $licencia->tipo == 'personal' ? ' selected' : '' }}>Personal</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha de Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $licencia->fecha_inicio }}" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin">Fecha de Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $licencia->fecha_fin }}" required>
                        </div>
    
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control">{{ $licencia->descripcion }}</textarea>
                    </div>
                </div>

                
               
               
                <button type="submit" class="btn btn-primary">Actualizar Licencia</button>
            </form>
        </div>
    </div>
@stop
