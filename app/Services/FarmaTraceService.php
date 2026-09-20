<?php

namespace App\Services;

class FarmaTraceService
{
    public function validarStockDisponible(int $stock, int $cantidad): bool
    {
        if ($stock <= 0 || $cantidad <= 0) return false;
        return $stock >= $cantidad;
    }

    public function evaluarEstadoCaducidad(int $dias): string
    {
        if ($dias < 0) return 'Caducado';
        if ($dias === 0) return 'Vence Hoy';
        if ($dias <= 30) return 'Critico';
        return 'Optimo';
    }

    public function calcularPromedioRotacionDiaria(array $consumos): float
    {
        if (empty($consumos)) return 0.0;
        return round(array_sum($consumos) / count($consumos), 2);
    }
}
