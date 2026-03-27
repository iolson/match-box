<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function groupStandings(): HasMany
    {
        return $this->hasMany(GroupStanding::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(GameMatch::class);
    }
}
