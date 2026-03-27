<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kill extends Model
{
    protected $fillable = [
        'match_id',
        'match_map_id',
        'round_number',
        'killer_steam_id',
        'killer_name',
        'killer_team',
        'killer_side',
        'victim_steam_id',
        'victim_name',
        'victim_team',
        'victim_side',
        'weapon',
        'is_headshot',
        'is_wallbang',
        'is_noscope',
        'is_through_smoke',
        'is_blind_kill',
        'is_entry_kill',
        'event_time',
    ];

    protected function casts(): array
    {
        return [
            'is_headshot' => 'boolean',
            'is_wallbang' => 'boolean',
            'is_noscope' => 'boolean',
            'is_through_smoke' => 'boolean',
            'is_blind_kill' => 'boolean',
            'is_entry_kill' => 'boolean',
            'event_time' => 'datetime',
        ];
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
