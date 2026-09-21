<?php

namespace App\Services;

class VentaService
{
    public function __construct(
        private DescuentoService $descuentoService
    ) {
    }

    public function calcularTotal(
        float $subtotal,
        bool $clienteFrecuente
    ): float {

        $porcentaje = $this->descuentoService
            ->obtenerPorcentaje($clienteFrecuente);

        $descuento = $subtotal * ($porcentaje / 100);

        return round($subtotal - $descuento, 2);
    }
}