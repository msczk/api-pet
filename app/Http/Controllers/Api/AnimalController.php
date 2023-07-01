<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalStoreRequest;
use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return AnimalResource::collection(Animal::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalStoreRequest $request): AnimalResource
    {
        $animal = Animal::create($request->all());
        return new AnimalResource($animal);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal): AnimalResource
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalStoreRequest $request, Animal $animal): AnimalResource
    {
        $animal->update($request->all());
        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response()->json();
    }
}
