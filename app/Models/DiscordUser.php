<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
