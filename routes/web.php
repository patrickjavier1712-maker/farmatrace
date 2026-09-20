<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;

// Ruta principal
Route::get('/', function () {
    return response()->json(['sistema' => 'FarmaTrace v1.0', 'estado' => 'Activo']);
});

// Ruta de evaluación conectada al controlador y protegida por regex
Route::get('/api/lotes/evaluar/{dias}', [LoteController::class, 'evaluarCaducidad'])
    ->whereNumber('dias') // QA: Protegemos que no inyecten letras o símbolos
    ->name('api.lotes.evaluar');
