<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FarmaTraceService;

class LoteController extends Controller
{
    private FarmaTraceService $service;

    // Inyectamos el servicio para no acoplar el código
    public function __construct(FarmaTraceService $service)
    {
        $this->service = $service;
    }

    public function evaluarCaducidad(int $dias)
    {
        $estado = $this->service->evaluarEstadoCaducidad($dias);

        // Retornamos JSON. Esto es CLAVE para conectar luego tu PWA (React/Vue/Angular)
        return response()->json([
            'dias_restantes' => $dias,
            'estado' => $estado,
            'requiere_accion' => in_array($estado, ['Caducado', 'Critico'])
        ]);
    }
}
