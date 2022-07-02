<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDeposito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'deposito',
        'comentario',
        'activo'
    ];
}
