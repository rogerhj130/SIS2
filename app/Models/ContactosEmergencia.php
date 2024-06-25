<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactosEmergencia extends Model
{
    use HasFactory;

    protected $fillable = [//campos permitidos para asignarles
        'empleado_id',
        'nombreRelacionEmpleado',
        'numeroEmergenciaFamiliar',
        'direccionEmergencia',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
