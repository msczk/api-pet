<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Returns DiscordUsers that own this animal
     *
     * @return BelongsToMany
     */
    public function discordUsers(): BelongsToMany
    {
        return $this->belongsToMany(DiscordUser::class);
    }
}
