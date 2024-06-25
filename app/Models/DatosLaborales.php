<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosLaborales extends Model
{
    use HasFactory;

    protected $fillable = [//campos permitidos
        'empleado_id',
        'salario',
        'puesto',
        'fechaContratacion',
        'fechaSalida',
        'trabajosAnteriores',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
