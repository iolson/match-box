<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeatmapPoint extends Model
{
    protected $fillable = [
        'match_id',
        'match_map_id',
        'round_number',
        'event_type',
        'x',
        'y',
        'z',
        'player_steam_id',
        'player_name',
        'player_team',
        'attacker_x',
        'attacker_y',
        'attacker_z',
        'attacker_steam_id',
        'attacker_name',
        'attacker_team',
        'round_time',
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
}
