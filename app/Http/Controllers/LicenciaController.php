<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;
use App\Models\Empleado;

class LicenciaController extends Controller
{
    public function create()
    {
        $empleados = Empleado::all();
        return view('licencias.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'ci' => 'required|exists:empleados,ci',
            'tipo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string',
        ]);
    
        // Buscar el empleado por CI
        $empleado = Empleado::where('ci', $request->ci)->firstOrFail();
    
        // Crear la licencia
        Licencia::create([
            'empleado_id' => $empleado->id,
            'tipo' => $request->tipo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'descripcion' => $request->descripcion,
        ]);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('licencias.index')->with('success', 'Licencia registrada exitosamente.');
    }
    

    public function index(Request $request)
    {
        $licencias = Licencia::with('empleado')
            ->when($request->filled('empleado_id'), function($query) use ($request) {
                $query->where('empleado_id', $request->empleado_id);
            })
            ->when($request->filled('tipo'), function($query) use ($request) {
                $query->where('tipo', $request->tipo);
            })
            ->when($request->filled('fecha_inicio'), function($query) use ($request) {
                $query->where('fecha_inicio', '>=', $request->fecha_inicio);
            })
            ->when($request->filled('fecha_fin'), function($query) use ($request) {
                $query->where('fecha_fin', '<=', $request->fecha_fin);
            })
            ->orderBy('fecha_inicio', 'desc')
            ->get();

        $empleados = Empleado::all();
        
        return view('licencias.index', compact('licencias', 'empleados'));
    }

    public function edit(Licencia $licencia)
    {
        $empleados = Empleado::all();
        return view('licencias.edit', compact('licencia', 'empleados'));
    }

    public function update(Request $request, Licencia $licencia)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'tipo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string',
        ]);

        $licencia->update($request->all());

        return redirect()->route('licencias.index')->with('success', 'Licencia actualizada exitosamente.');
    }

    public function destroy(Licencia $licencia)
    {
        $licencia->delete();
        return redirect()->route('licencias.index')->with('success', 'Licencia eliminada exitosamente.');
    }
}
