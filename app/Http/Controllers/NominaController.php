<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomina;
use App\Models\Empleado;
use Carbon\Carbon;

class NominaController extends Controller
{
    public function calcular()
{
    // Obtenemos los empleados que tienen menos de 30 días trabajados
    $empleados = Empleado::whereHas('asistencias', function($query) {
        $query->havingRaw('COUNT(*) < 30');
    }, '>=', 1)->get();

    // Calculamos y asignamos los atributos adicionales a cada empleado
    foreach ($empleados as $empleado) {
        // Obtenemos los datos laborales del empleado
        $datosLaborales = $empleado->datosLaborales;

        // Validamos que existan datos laborales para el empleado
        if ($datosLaborales) {
            // Calcular el sueldo
            $sueldo = $datosLaborales->salario;

            // Simular bono de antigüedad (ejemplo: 5% del salario por cada año trabajado)
            $antiguedad = Carbon::parse($empleado->fechaContratacion)->diffInYears(Carbon::now());
            $bonoAntiguedad = $sueldo * ($antiguedad * 0.1);

            //ingresos y descuentos
            $otrosIngresos = 500; //bono adicional
            $descuentoAFP = $sueldo * 0.1; //descuento AFP

            // Calcular total ganado
            $totalGanado = $sueldo + $bonoAntiguedad + $otrosIngresos;

            // Calcular descuentos
            $descuento = $descuentoAFP;

            // Calcular líquido pagable
            $liquidoPagable = $totalGanado - $descuento;

            // Asignar estos valores al objeto Empleado
            $empleado->sueldo = $sueldo;
            $empleado->bonoAntiguedad = $bonoAntiguedad;
            $empleado->totalGanado = $totalGanado;
            $empleado->afp = $descuentoAFP;
            $empleado->descuento = $descuento;
            $empleado->liquidoPagable = $liquidoPagable;
        }
    }

    return view('nomina.index', compact('empleados'));
}

    


    public function generar(Request $request)
    {
        // Lógica para calcular sueldos, deducciones y generar nóminas
        // Guarda las nóminas generadas en la base de datos
        foreach ($request->empleados as $empleado_id) {
            $empleado = Empleado::find($empleado_id);
            $sueldos = $this->calcularSueldo($empleado);

            Nomina::create([
                'empleado_id' => $empleado->id,
                'sueldo' => $sueldos['sueldo'],
                'deducciones' => $sueldos['deducciones'],
                'neto' => $sueldos['neto'],
                'mes' => now()->format('Y-m'),
            ]);
        }

        return redirect()->route('nomina.historial')->with('success', 'Nóminas generadas correctamente');
    }

    public function historial()
    {
       /*  $nominas = Nomina::orderBy('mes', 'desc')->get(); */
        return view('nomina.historial'/* , compact('nominas') */);
    }

    private function calcularSueldo($empleado)
    {
        // Lógica para calcular el sueldo, deducciones y neto
        $sueldo = $empleado->salario;
        $deducciones = 0; // Aquí agregamos la lógica de deducciones por faltas y licencias
        $neto = $sueldo - $deducciones;

        return [
            'sueldo' => $sueldo,
            'deducciones' => $deducciones,
            'neto' => $neto,
        ];
    }
}
