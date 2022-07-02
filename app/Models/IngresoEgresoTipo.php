<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoEgresoTipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'metodo',
        'descripcion',
        'activo',
    ];
}
