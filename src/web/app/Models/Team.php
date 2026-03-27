<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'country_code',
        'logo_path',
        'link',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function eventTeams(): HasMany
    {
        return $this->hasMany(EventTeam::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_teams');
    }
}
