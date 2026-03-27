<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roster extends Model
{
    protected $fillable = [
        'event_team_id',
        'player_id',
        'is_captain',
    ];

    protected function casts(): array
    {
        return [
            'is_captain' => 'boolean',
        ];
    }

    public function eventTeam(): BelongsTo
    {
        return $this->belongsTo(EventTeam::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
