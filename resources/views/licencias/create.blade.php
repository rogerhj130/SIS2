@extends('adminlte::page')

@section('title', 'Registrar Licencia')

@section('content_header')
    <div class="text-center">
        <h1>Licencia</h1>
    </div>
   
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registrar Licencia</h3>
        </div>
        <div class="card-body ">
            <form action="{{ route('licencias.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ci">Número de Carnet (CI):</label>
                            <input type="text" name="ci" id="ci" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo de Licencia:</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="enfermedad">Enfermedad</option>
                                <option value="vacaciones">Vacaciones</option>
                                <option value="personal">Personal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha de Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin">Fecha de Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Licencia</button>
            </form>
        </div>
    </div>
@stop
