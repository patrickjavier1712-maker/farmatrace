<?php

namespace App\Services;

use App\Models\Lote;

class LoteService
{
    public function puedeVender(Lote $lote, int $cantidad): bool
    {
        // No se permiten cantidades inválidas
        if ($cantidad <= 0) {
            return false;
        }

        // No se puede vender si no hay stock
        if ($lote->stock <= 0) {
            return false;
        }

        // No se puede vender un lote vencido
        if ($lote->fecha_vencimiento->lt(today())) {
            return false;
        }

        // Finalmente verificamos si alcanza el stock
        return $lote->stock >= $cantidad;
    }
}