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

    /**
     * Evalúa el nivel de stock en base a la capacidad máxima.
     */
    public function evaluarCriticidadStock(int $capacidad, int $stock): string
    {
        // Validación de datos absurdos (análogo al caso de ocupación > capacidad)
        if ($stock > $capacidad || $stock < 0) {
            return "Error";
        }

        if ($capacidad === 0) {
            return "Error";
        }

        $porcentaje = ($stock * 100) / $capacidad;

        if ($porcentaje <= 20) {
            return "Crítico";
        } elseif ($porcentaje <= 50) {
            return "Bajo";
        } elseif ($porcentaje <= 80) {
            return "Normal";
        } else {
            return "Óptimo";
        }
    }
}
