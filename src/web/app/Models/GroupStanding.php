<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupStanding extends Model
{
    protected $fillable = [
        'group_id',
        'event_team_id',
        'wins',
        'losses',
        'draws',
        'round_diff',
        'buchholz',
        'tiebreaker_rank',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function eventTeam(): BelongsTo
    {
        return $this->belongsTo(EventTeam::class);
    }
}
