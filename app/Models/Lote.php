<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    // Campos que el sistema tiene permitido llenar y guardar
    protected $fillable = [
        'codigo_lote',
        'nombre_medicamento',
        'stock',
        'fecha_vencimiento'
    ];
}
