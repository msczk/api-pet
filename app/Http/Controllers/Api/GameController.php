<?php

namespace App\Http\Controllers\Api;

use App\Models\Animal;
use App\Models\DiscordUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalResource;
use App\Http\Requests\DiscordUserAnimalStoreRequest;

class GameController extends Controller
{
    public function catchRandomAnimal(DiscordUserAnimalStoreRequest $request)
    {
        $id_discord = $request->input('id_discord');

        $discordUser = DiscordUser::where('id_discord', $id_discord)->firstOrFail();
        
        $animals = Animal::all();

        $random_index = rand(0, count($animals)-1);

        $animal = $animals[$random_index];

        $discordUser->animals()->save($animal);

        return new AnimalResource($animal);
    }
}
