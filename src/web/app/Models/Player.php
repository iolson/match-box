<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $fillable = [
        'steam_id',
        'name',
        'avatar_path',
        'country_code',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function rosters(): HasMany
    {
        return $this->hasMany(Roster::class);
    }

    public function matchPlayers(): HasMany
    {
        return $this->hasMany(MatchPlayer::class);
    }
}
