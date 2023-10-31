<?php

namespace Tests\Feature\Countries;

use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateCountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_actualizar_un_pais()
    {
        $this->withoutExceptionHandling();

        $pais = Pais::factory()->create();

        $response = $this->putJson(route('api.v1.paises.update', $pais), [
            'nombre' => 'Brasil'
        ]);

        $response->assertExactJson([
            'data' => [
                'nombre' => 'Brasil'
            ]
        ]);
    }
}
