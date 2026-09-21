<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoteController;

Route::get('/', function () {
    return view('dashboard');
})->name('inicio');

// Rutas CRUD para Lotes
Route::get('/lotes', [LoteController::class, 'index'])->name('lotes.index'); // Listar todos los registros[cite: 1]
Route::get('/lotes/create', [LoteController::class, 'create'])->name('lotes.create'); // Formulario de creación[cite: 1]
Route::post('/lotes', [LoteController::class, 'store'])->name('lotes.store'); // Acción de guardar[cite: 1]
Route::get('/lotes/{lote}', [LoteController::class, 'show'])->name('lotes.show'); // Mostrar un registro[cite: 1]
Route::get('/lotes/{lote}/edit', [LoteController::class, 'edit'])->name('lotes.edit'); // Formulario de edición[cite: 1]
Route::put('/lotes/{lote}', [LoteController::class, 'update'])->name('lotes.update'); // Acción de actualizar[cite: 1]
Route::delete('/lotes/{lote}', [LoteController::class, 'destroy'])->name('lotes.destroy'); // Acción de eliminar[cite: 1]

// Ruta de API predictiva que ya teníamos
Route::get('/api/lotes/evaluar/{dias}', [LoteController::class, 'evaluarCaducidad'])->whereNumber('dias');
