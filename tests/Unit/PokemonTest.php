<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Http;

class PokemonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     * @return void
     */
    public function search_pokemon()
    {
        $this->get('/')
            ->type('Bulbasaur', 'search')
            ->press('Buscar')
            ->get('/')
            ->see('Bulbasaur');
    }
}
