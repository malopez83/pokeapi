<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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
        $this->visit('/')
            ->type('Bulbasaur', 'search')
            ->press('Buscar')
            ->get('/')
            ->see('Bulbasaur');
    }
}
