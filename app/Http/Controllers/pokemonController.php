<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pokemonModel;
use Illuminate\Support\Facades\Http;



class pokemonController extends Controller
{
    public function add(Request $request)
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokedex/1/');
        $jsonData = $response->json();
        for ($i = 0; $i < 150; $i++) {
            $this->valaidateRequest();
            $iscreated = pokemonModel::create([
                "name" => $jsonData['pokemon_entries'][$i]['pokemon_species']['name'],
                "link" => $jsonData['pokemon_entries'][$i]['pokemon_species']['url'],
                "ID" => $jsonData['pokemon_entries'][$i]['entry_number'],
            ]);
        }

    }
    private function valaidateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'link' => 'required',
            'ID' => 'required',
        ]);
    }
    public function get(Request $request)
    {
        return pokemonModel::all();
    }
}
