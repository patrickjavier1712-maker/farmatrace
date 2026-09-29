<?php

namespace App\Services;

use App\Models\Lote;
use Exception;

class VentaService
{
    // 1. Error de sintaxis crítico corregido (llaves agregadas)
    public function __construct(
        private DescuentoService $descuentoService
    ) {}

    public function calcularTotal(
        float $subtotal,
        bool $clienteFrecuente
    ): float {
        $porcentaje = $this->descuentoService
            ->obtenerPorcentaje($clienteFrecuente);

        $descuento = $subtotal * ($porcentaje / 100);

        return round($subtotal - $descuento, 2);
    }

    // 2. NUEVA VALIDACIÓN (El núcleo de tu Fase 4 del examen)
    public function procesarVentaLote(Lote $lote, int $cantidadSolicitada): void
    {
        // Validación 1: Evitar venta de fármacos caducados
        if ($lote->fecha_vencimiento < now()) {
            throw new Exception("Operación rechazada: El lote caducó en la fecha {$lote->fecha_vencimiento}.");
        }

        // Validación 2: Evitar stock negativo (Kardex básico)
        if ($lote->stock < $cantidadSolicitada) {
            throw new Exception("Operación rechazada: Stock insuficiente. Disponible: {$lote->stock}.");
        }

        // Aquí iría la lógica transaccional para descontar el stock
        // $lote->decrement('stock', $cantidadSolicitada);
    }
}