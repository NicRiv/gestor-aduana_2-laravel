<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'deposito',
        'area',
        'nombre',
        'condicion',
        'unidad_logistica',
        'cantidad_almacenaje',
        'cantidad_disponible',
        'stock',
        'comentarios',
        'activo'
    ];
}
