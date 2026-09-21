<?php

namespace Tests\Unit;

use App\Models\Lote;
use App\Services\LoteService;
use PHPUnit\Framework\TestCase;

class LoteServiceTest extends TestCase
{
    public function test_puede_vender_cuando_hay_stock_suficiente(): void
    {
        // GIVEN
        $lote = new Lote([
            'stock' => 10,
        ]);

        $service = new LoteService();

        // WHEN
        $resultado = $service->puedeVender($lote, 4);

        // THEN
        $this->assertTrue($resultado);
    }

    public function test_no_puede_vender_cuando_stock_es_insuficiente(): void
    {
        // GIVEN
        $lote = new Lote([
            'stock' => 3,
        ]);

        $service = new LoteService();

        // WHEN
        $resultado = $service->puedeVender($lote, 5);

        // THEN
        $this->assertFalse($resultado);
    }
}