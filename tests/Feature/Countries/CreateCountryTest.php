<?php

namespace Tests\Feature\Countries;

use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_pais()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.v1.paises.store'), [
            'data' => [
                'nombre' => 'Argentina'
            ]
        ]);

        $response->assertCreated();

        $pais = Pais::first();

        $response->assertHeader(
            'Location',
            route('api.v1.paises.show', $pais)
        );

        $response->assertExactJson([
            'data' => [
                'nombre' => 'Argentina'
            ]
        ]);
    }
}
