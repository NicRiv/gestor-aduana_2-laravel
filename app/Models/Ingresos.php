<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_ingreso',
        'tipo',
        'division',
        'vencimiento',
        'comentario'
    ];
}
