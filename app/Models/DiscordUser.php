<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class DiscordUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id_discord'
    ];

    /**
     * Returns animals owned by this DiscordUser
     *
     * @return BelongsToMany
     */
    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class)->withTimestamps()->withPivot(['hunger', 'amusement', 'sleep']);
    }

    /**
     * Check if the DiscordUser caught every animals available
     *
     * @return boolean
     */
    public function caughtEveryAnimals(): bool
    {
        $countAnimals = Animal::count();
        $countDiscordUserAnimals = $this->animals()->count();

        if($countDiscordUserAnimals >= $countAnimals)
        {
            return true;
        }

        return false;
    }

    /**
     * Undocumented function
     *
     * @return array<int>
     */
    public function animalAlreadyCaughtIds(): array
    {
        $alreadyCaughtIds = array();

        foreach($this->animals as $animal)
        {
            $alreadyCaughtIds[] = $animal->id;
        }

        return $alreadyCaughtIds;
    }
}
