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
        return $this->belongsToMany(Animal::class)->withTimestamps();
    }
}
