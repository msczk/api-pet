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

        if($discordUser->caughtEveryAnimals())
        {
            return response()->json(['error' => 'You already caught every animals available'], 422);
        }

        $alreadyCaughtIds = $discordUser->animalAlreadyCaughtIds();
        
        $animals = Animal::whereNotIn('id', $alreadyCaughtIds)->get();

        $random_index = rand(0, count($animals)-1);
        $animal = $animals[$random_index];       

        $discordUser->animals()->attach($animal, ['hunger' => 3, 'amusement' => 3, 'sleep' => 3]);

        return new AnimalResource($animal);
    }

    public function feedAnimal(FeedRequest $request)
    {
        $id_discord = $request->input('id_discord');
        $animal_slug = $request->input('slug');

        $discordUser = DiscordUser::where('id_discord', $id_discord)->firstOrFail();
        $animal = Animal::where('slug', $animal_slug)->firstOrFail();
        
        $discordUserAnimal = $discordUser->animals()->where('animal_id', $animal->id)->firstOrFail();
        $hunger = $discordUserAnimal->pivot->hunger;

        if($hunger < 3)
        {
            $hunger++;

            $discordUser->animals()->updateExistingPivot($animal->id, ['hunger' => $hunger]);
        }else{
            return response()->json(['error' => 'Your '.$animal->name.' isn\'t hungry'], 422);
        }

        return new AnimalResource($animal);
    }

        $discordUser->animals()->updateExistingPivot($animal->id, ['hunger' => $hunger]);

        return new AnimalResource($animal);
    }
}
