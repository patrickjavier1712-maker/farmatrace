<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FarmaTraceService;
use App\Models\Lote; // Importación obligatoria del modelo

class LoteController extends Controller
{
    private FarmaTraceService $service;

    public function __construct(FarmaTraceService $service)
    {
        $this->service = $service;
    }

    // Listar todos los registros
    public function index()
    {
        $lotes = Lote::all(); // Obtiene todos los lotes de la base de datos
        return view('lotes.index', compact('lotes')); // Envía los datos a la vista Blade
    }

    // Mostrar el formulario para crear
    public function create()
    {
        return view('lotes.create');
    }

    // (Mantén aquí el método evaluarCaducidad que ya tenías)
    public function evaluarCaducidad(int $dias)
    {
        $estado = $this->service->evaluarEstadoCaducidad($dias);
        return response()->json([
            'dias_restantes' => $dias,
            'estado' => $estado,
            'requiere_accion' => in_array($estado, ['Caducado', 'Critico'])
        ]);
    }
}
