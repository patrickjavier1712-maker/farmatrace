<?php

namespace Tests\Unit;

use App\Services\DescuentoService;
use App\Services\VentaService;
use Mockery;
use Tests\TestCase;

class VentaServiceTest extends TestCase
{
    public function test_calcula_total_usando_descuento_de_cliente_frecuente(): void
    {
        // GIVEN
        $descuentoMock = Mockery::mock(DescuentoService::class);

        $descuentoMock
            ->shouldReceive('obtenerPorcentaje')
            ->once()
            ->with(true)
            ->andReturn(10.0);

        $ventaService = new VentaService($descuentoMock);

        // WHEN
        $total = $ventaService->calcularTotal(
            100.00,
            true
        );

        // THEN
        $this->assertEquals(90.00, $total);
    }
}