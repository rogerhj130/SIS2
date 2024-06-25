<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id', 'tipo', 'fecha_inicio', 'fecha_fin', 'descripcion',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
