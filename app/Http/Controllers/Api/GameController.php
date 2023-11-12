<?php

namespace App\Http\Controllers\Api;

use App\Models\Animal;
use App\Models\DiscordUser;
use App\Http\Requests\FeedRequest;
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
    public function feedAnimal(FeedRequest $request)
    {
        $id_discord = $request->input('id_discord');
        $animal_slug = $request->input('slug');

        $discordUser = DiscordUser::where('id_discord', $id_discord)->firstOrFail();
        $animal = Animal::where('slug', $animal_slug)->firstOrFail();
        
        $discordUserAnimal = $discordUser->animals()->where('animal_id', $animal->id)->firstOrFail();
        $hunger = $discordUserAnimal->pivot->hunger;

        $hunger++;

        $discordUser->animals()->updateExistingPivot($animal->id, ['hunger' => $hunger]);

        return new AnimalResource($animal);
    }
}
