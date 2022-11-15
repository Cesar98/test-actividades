<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crear_reservacion()
    {

        $response = $this->get('api/reservar', [
            'actividad_id' => random_int(1,10),
            'personas' => 10,
            'fecha' => now()
        ]);

        $response->assertSee("success");
    }
}
