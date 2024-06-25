<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'fecha', 'accion', 'descripcion'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
