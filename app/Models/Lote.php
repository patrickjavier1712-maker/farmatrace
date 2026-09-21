<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'codigo_lote',
        'stock',
        'fecha_vencimiento',
        'precio_compra',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date',
        'precio_compra' => 'decimal:2',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}