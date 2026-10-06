<?php

namespace Tests\Feature;

use App\Models\Lote;
use Tests\TestCase;
use Illuminate\Support\Carbon;

class LoteTest extends TestCase
{
    public function test_lote_con_fecha_pasada_se_considera_caducado(): void
    {
        // GIVEN: Creamos un lote en memoria con fecha de ayer (Valor Límite)
        $lote = new Lote();
        $lote->fecha_vencimiento = Carbon::now()->subDays(1);

        // WHEN: Le preguntamos al modelo si está vencido
        $resultado = $lote->estaVencido();

        // THEN: El sistema debe devolver verdadero (true)
        $this->assertTrue($resultado, 'El modelo Lote falló al detectar su propia caducidad.');
    }
}