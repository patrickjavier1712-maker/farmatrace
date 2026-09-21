<?php

namespace App\Services;

use App\Models\Lote;

class LoteService
{
    public function puedeVender(Lote $lote, int $cantidad): bool
    {
        if ($cantidad <= 0) {
            return false;
        }

        if ($lote->stock <= 0) {
            return false;
        }

        return $lote->stock >= $cantidad;
    }
}