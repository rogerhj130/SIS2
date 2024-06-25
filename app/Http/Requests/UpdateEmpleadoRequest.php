<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombreCompleto' => 'required|string|max:255',
            'ci' => 'required|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'fechaNacimiento' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:255',
            'salario' => 'nullable|numeric',
            'puesto' => 'nullable|string|max:255',
            'fechaContratacion' => 'nullable|date',
            'fechaSalida' => 'nullable|date',
            'trabajosAnteriores' => 'nullable|string|max:255',
            'nombreRelacionEmpleado' => 'nullable|string|max:255',
            'numeroEmergenciaFamiliar' => 'nullable|string|max:15',
            'direccionEmergencia' => 'nullable|string|max:255',
        ];
    }
}
