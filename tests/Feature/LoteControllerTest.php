<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoteControllerTest extends TestCase
{
    public function test_ruta_evaluar_retorna_json_y_status_200(): void
    {
        // GIVEN: Un usuario accede a la ruta con 15 días restantes
        // WHEN: Hacemos la petición GET
        $response = $this->get('/api/lotes/evaluar/15');

        // THEN: Verificamos que la web responda OK y el JSON sea correcto
        $response->assertStatus(200)
            ->assertJsonFragment([
                'dias_restantes' => 15,
                'estado' => 'Critico',
                'requiere_accion' => true
            ]);
    }

    public function test_ruta_rechaza_letras_por_proteccion_regex(): void
    {
        // GIVEN: Un ataque o error de tipado con letras en lugar de números
        // WHEN: Hacemos la petición GET
        $response = $this->get('/api/lotes/evaluar/abc');

        // THEN: El sistema debe bloquearlo con un error 404 (Not Found) gracias al whereNumber()
        $response->assertStatus(404);
    }
}
