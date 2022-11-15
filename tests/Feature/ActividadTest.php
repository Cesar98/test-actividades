<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_actividad_detalle()
    {

        $response = $this->get('api/actividad/detalle', [
            'actividad_id' => random_int(1,10)
        ]);

        $response->assertSee("actividad");

    }
}
