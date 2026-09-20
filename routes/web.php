<?php

use Illuminate\Support\Facades\Route;
use App\Services\FarmaTraceService;

// Ruta principal (Dashboard)
Route::get('/', function () {
    return "Bienvenido a FarmaTrace - Sistema Predictivo";
});

// Ruta con parámetros: Consultar estado de un lote (Ej: /lote/15)
Route::get('/lote/{dias_restantes}', function ($dias_restantes) {
    $service = new FarmaTraceService();
    $estado = $service->evaluarEstadoCaducidad((int) $dias_restantes);

    return "El estado del lote con {$dias_restantes} días restantes es: <strong>{$estado}</strong>";
})->whereNumber('dias_restantes'); // Expresión regular: solo acepta números