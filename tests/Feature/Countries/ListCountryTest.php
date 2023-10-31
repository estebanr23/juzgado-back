<?php

namespace Tests\Feature\Countries;

use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListCountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_obtener_un_solo_pais(): void
    {
        $this->withoutExceptionHandling();

        $pais = Pais::factory()->create();
        
        $response = $this->getJson(route('api.v1.paises.show', $pais));

        $response->assertExactJson([
            'data' => [
                'nombre' => $pais->nombre
            ]
        ]);
    }

    /** @test */
    public function puede_obtener_todos_los_paises(): void
    {
        $this->withExceptionHandling();

        $paises = Pais::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.paises.index'));

        $response->assertExactJson([
            'data' => [
                [
                    'nombre' => $paises[0]->nombre
                ],
                [
                    'nombre' => $paises[1]->nombre
                ],
                [
                    'nombre' => $paises[2]->nombre
                ],
            ],
            'links' => [
                'self' => route('api.v1.paises.index')
            ]
        ]);
    }
}
