<?php

namespace App\Http\Controllers\Api;

use App\Models\DiscordUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiscordUserResource;
use App\Http\Requests\DiscordUserStoreRequest;
use App\Http\Requests\DiscordUserAnimalStoreRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DiscordUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return DiscordUserResource::collection(DiscordUser::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscordUserStoreRequest $request): DiscordUserResource
    {
        $data = $request->all();

        $discordUser = DiscordUser::where('id_discord', $data['id_discord'])->first();

        if(!$discordUser)
        {
            $discordUser = DiscordUser::create($data);
        }

        return new DiscordUserResource($discordUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscordUser $discordUser): DiscordUserResource
    {
        return new DiscordUserResource($discordUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscordUserStoreRequest $request, DiscordUser $discordUser): DiscordUserResource
    {
        $data = $request->all();

        $discordUser->update($data);
        return new DiscordUserResource($discordUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscordUser $discordUser)
    {
        $discordUser->delete();
        return response()->json();
    }

    public function indexAnimals(string $id_discord)
    {
        $discordUser = DiscordUser::where('id_discord', $id_discord)->firstOrFail();

        return AnimalResource::collection($discordUser->animals);
    }
}
