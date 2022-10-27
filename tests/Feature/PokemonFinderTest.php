<?php

namespace Tests\Feature;

use App\Http\Controllers\FinderController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonFinderTest extends TestCase
{
    /**
     * Test básico para comprobar que la app funciona
     *
     * @return void
     */
    public function test_app_esta_funcionando()
    {
        $response = $this->get('/');   
        
        $response->assertStatus(200);
    }

    /**
     * Test de búsqueda de un pokemon con nombre completo
     *
     * @return void
     */
    public function test_busqueda_nombre_pokemon_completo()
    {
        $response = $this->get('/?search=ivysaur');   
        
        $response->assertSee('Ivysaur');
    }

    /**
     * Test de búsqueda de un pokemon con nombre parcial
     *
     * @return void
     */
    public function test_busqueda_nombre_pokemon_parcial()
    {
        $response = $this->get('/?search=bulba');   
        
        $response->assertSee('Bulbasaur');
    }

    /**
     * Test de búsqueda de un pokemon con nombre parcial con varios resultados
     *
     * @return void
     */
    public function test_busqueda_nombre_pokemon_parcial_varios_resultados()
    {
        $response = $this->get('/?search=saur');   
        
        $response->assertSee('Bulbasaur');
        $response->assertSee('Ivysaur');
        $response->assertSee('Venusaur');
    }

    /**
     * Test de búsqueda verificar minimino requerido de 3 caracteres con error
     *
     * @return void
     */
    public function test_busqueda_verificar_minimo_error()
    {
        $response = $this->get('/?search=sa');   
        
        $response->assertSessionHasErrors([
            'search' => 'La search debe tener al menos 3 caracteres.'
        ]);
    }

}
