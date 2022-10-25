<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FinderController extends Controller
{
    /**
     * Show results from PokeApi
     * @return \Illuminate\View\View
     */

    public function index(Request $request) 
    {
        if($request->input('search')){
            return view('finder', ['pokemons' => $this->search($request->input('search'))]);
        } else {
            return view('finder', ['pokemons' => $this->getPokemons()]);
        }
    }

    public function search($termToSearch)
    {
        $pokemonsAPI = $this->getPokemonsAPI(true);
        $pokemonsAPI = $pokemonsAPI['results'];

        $matches = array_filter($pokemonsAPI, function($var) use ($termToSearch) { return stristr($var['name'], $termToSearch); });

        $pokemons = [];

        foreach ($matches as $poke) 
        {
            $poke['picture'] = $this->getPicture($poke);

            $pokemons[] = $poke;
        }

        return $pokemons;
    }

    private function getPokemonsAPI($all = false)
    {
        $urlAPI = 'https://pokeapi.co/api/v2/pokemon/';

        if($all) {
            $url = $urlAPI.'?limit=100000&offset=0';
        } else {
            $url = $urlAPI;
        }
        
        $result = Http::get($url);

        return $result->json();
    }

    private function getPokemons()
    {
        $pokemonsAPI = $this->getPokemonsAPI();
        $pokemonsAPI = $pokemonsAPI['results'];

        $pokemons = [];

        foreach ($pokemonsAPI as $poke) 
        {
            $poke['picture'] = $this->getPicture($poke);

            $pokemons[] = $poke;
        }

        return $pokemons;
    }

    private function getPicture($poke)
    {
        $pokeURL = Http::get($poke['url']);
        $pokeURL->json();

        return $pokeURL['sprites']['front_default'];
    }
}
