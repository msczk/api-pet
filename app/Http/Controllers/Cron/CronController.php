<?php

namespace App\Http\Controllers\Cron;

use App\Models\DiscordUser;
use App\Http\Controllers\Controller;

class CronController extends Controller
{
    public function makeAnimalsHungry()
    {
        $discordUsers = DiscordUser::all();

        foreach($discordUsers as $discordUser)
        {
            $animals = $discordUser->animals;

            foreach($animals as $animal)
            {
                $hunger = $animal->pivot->hunger;

                if($hunger > 0)
                {
                    $hunger--;

                    $discordUser->animals()->updateExistingPivot($animal->id, ['hunger' => $hunger]);
                }
            }
        }
        
        return response()->json();
    }

    public function makeAnimalsSleepy()
    {
        $discordUsers = DiscordUser::all();

        foreach($discordUsers as $discordUser)
        {
            $animals = $discordUser->animals;

            foreach($animals as $animal)
            {
                $sleep = $animal->pivot->sleep;

                if($sleep > 0)
                {
                    $sleep--;

                    $discordUser->animals()->updateExistingPivot($animal->id, ['sleep' => $sleep]);
                }
            }
        }
        
        return response()->json();
    }

    public function makeAnimalsBored()
    {
        $discordUsers = DiscordUser::all();

        foreach($discordUsers as $discordUser)
        {
            $animals = $discordUser->animals;

            foreach($animals as $animal)
            {
                $amusement = $animal->pivot->amusement;

                if($amusement > 0)
                {
                    $amusement--;

                    $discordUser->animals()->updateExistingPivot($animal->id, ['amusement' => $amusement]);
                }
            }
        }
        
        return response()->json();
    }
}
