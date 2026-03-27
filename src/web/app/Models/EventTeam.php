<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventTeam extends Model
{
    protected $fillable = [
        'event_id',
        'team_id',
        'seed',
        'group',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function rosters(): HasMany
    {
        return $this->hasMany(Roster::class);
    }

    public function groupStanding(): HasOne
    {
        return $this->hasOne(GroupStanding::class);
    }

    public function matchesAsTeamA(): HasMany
    {
        return $this->hasMany(GameMatch::class, 'team_a_id');
    }

    public function matchesAsTeamB(): HasMany
    {
        return $this->hasMany(GameMatch::class, 'team_b_id');
    }
}
