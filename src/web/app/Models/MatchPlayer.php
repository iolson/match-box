<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatchPlayer extends Model
{
    protected $fillable = [
        'match_id',
        'match_map_id',
        'player_id',
        'steam_id',
        'name',
        'team_side',
        'kills',
        'assists',
        'deaths',
        'headshots',
        'team_kills',
        'bomb_plants',
        'bomb_defuses',
        'rounds_with_1k',
        'rounds_with_2k',
        'rounds_with_3k',
        'rounds_with_4k',
        'rounds_with_5k',
        'clutch_1v1',
        'clutch_1v2',
        'clutch_1v3',
        'clutch_1v4',
        'clutch_1v5',
        'first_kills',
        'first_deaths',
        'rating',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function match(): BelongsTo
    {
        return $this->belongsTo(GameMatch::class);
    }

    public function matchMap(): BelongsTo
    {
        return $this->belongsTo(MatchMap::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function playerSnapshots(): HasMany
    {
        return $this->hasMany(PlayerSnapshot::class);
    }
}
