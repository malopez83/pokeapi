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
        return view('finder', ['pokemons' => $this->getPokemons($request->input('search'))]);
    }

    private function getPokemons($search)
    {
        $all = $search ? true : false;
        $pokemonsAPI = $this->getPokemonsAPI($all);
        $pokemonsAPI = $pokemonsAPI['results'];

        if($search) {
            $pokemonsAPI = array_filter($pokemonsAPI, function($var) use ($search) { return stristr($var['name'], $search); });
        }        

        $pokemonsAPI = $this->addPicture($pokemonsAPI);

        return $pokemonsAPI;        
    }

    private function addPicture($arr)
    {
        $pokemons = [];
        foreach ($arr as $poke) 
        {
            $pokeURL = Http::get($poke['url']);
            $pokeURL->json();

            $poke['picture'] = $pokeURL['sprites']['front_default'];

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
}
