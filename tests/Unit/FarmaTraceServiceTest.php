<?php

namespace Tests\Unit;

use App\Services\FarmaTraceService;
use PHPUnit\Framework\TestCase;

class FarmaTraceServiceTest extends TestCase
{
    private FarmaTraceService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new FarmaTraceService();
    }

    public function test_validar_stock_disponible(): void
    {
        $this->assertTrue($this->service->validarStockDisponible(15, 5));
        $this->assertFalse($this->service->validarStockDisponible(3, 10));
    }

    public function test_evaluar_estado_caducidad(): void
    {
        $this->assertEquals('Optimo', $this->service->evaluarEstadoCaducidad(45));
        $this->assertEquals('Critico', $this->service->evaluarEstadoCaducidad(15));
        $this->assertEquals('Caducado', $this->service->evaluarEstadoCaducidad(-5));
    }

    public function test_calcular_promedio_rotacion_diaria(): void
    {
        $this->assertEquals(15.0, $this->service->calcularPromedioRotacionDiaria([10, 15, 20]));
        $this->assertEquals(0.0, $this->service->calcularPromedioRotacionDiaria([]));
    }

    public function test_evaluar_criticidad_stock_con_diferentes_rangos(): void
    {
        $this->assertEquals("Crítico", $this->service->evaluarCriticidadStock(100, 15));
        $this->assertEquals("Bajo", $this->service->evaluarCriticidadStock(100, 40));
        $this->assertEquals("Normal", $this->service->evaluarCriticidadStock(100, 70));
        $this->assertEquals("Óptimo", $this->service->evaluarCriticidadStock(100, 90));
        
        // Pruebas de error (valores fuera de rango)
        $this->assertEquals("Error", $this->service->evaluarCriticidadStock(100, 120));
        $this->assertEquals("Error", $this->service->evaluarCriticidadStock(100, -5));
    }
}
