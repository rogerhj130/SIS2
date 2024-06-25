<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\Empleado;
use App\Models\DatosLaborales;
use App\Models\ContactosEmergencia;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleados.create');
    }

    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = Empleado::create($request->only([
            'nombreCompleto', 'ci','telefono', 'fechaNacimiento', 'email', 'direccion',
        ]));

        DatosLaborales::create([
            'empleado_id' => $empleado->id,
            'salario' => $request->salario,
            'puesto' => $request->puesto,
            'fechaContratacion' => $request->fechaContratacion,
            'fechaSalida' => $request->fechaSalida,
            'trabajosAnteriores' => $request->trabajosAnteriores,
        ]);

        ContactosEmergencia::create([
            'empleado_id' => $empleado->id,
            'nombreRelacionEmpleado' => $request->nombreRelacionEmpleado,
            'numeroEmergenciaFamiliar' => $request->numeroEmergenciaFamiliar,
            'direccionEmergencia' => $request->direccionEmergencia,
        ]);

        return redirect()->route('empleados.index')->with('success', 'Empleado registrado exitosamente');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->update($request->only([
            'nombreCompleto','ci', 'telefono', 'fechaNacimiento', 'email', 'direccion'
        ]));

        $empleado->datosLaborales->update($request->only([
            'salario', 'puesto', 'fechaContratacion', 'fechaSalida', 'trabajosAnteriores'
        ]));

        $empleado->contactosEmergencia->update($request->only([
            'nombreRelacionEmpleado', 'numeroEmergenciaFamiliar', 'direccionEmergencia'
        ]));

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente');
    }

    public function index()
    {
        $empleados = Empleado::all(); // Obtén todos los empleados desde tu modelo Empleado

        return view('empleados.index', compact('empleados')); // Pasar $empleados a la vista
    }


    public function historial($id)
    {
        $empleado = Empleado::findOrFail($id);
        $historial = $empleado->historial;

        return view('empleados.historial', compact('empleado', 'historial'));
    }
}
