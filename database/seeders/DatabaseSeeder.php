<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $animals = [
            "Chien",
            "Chat",
            "Poisson",
            "Oiseau",
            "Lapin",
            "Hamster",
            "Cochon d'Inde",
            "Furet",
            "Rat",
            "Souris",
            "Tortue",
            "Lézard",
            "Serpent",
            "Cheval",
            "Vache",
            "Mouton",
            "Chèvre",
            "Cochon",
            "Poule",
            "Canard",
            "Dinde",
            "Abeille",
            "Poisson rouge",
            "Poney",
        ];

        foreach($animals as $animal)
        {
            \App\Models\Animal::create(
                [
                    'name' => $animal,
                    'slug' => Str::slug($animal, "-")
                ]
            );
        }
    }
}
