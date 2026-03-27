<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'start_date',
        'end_date',
        'logo_path',
        'link',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function eventTeams(): HasMany
    {
        return $this->hasMany(EventTeam::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function brackets(): HasMany
    {
        return $this->hasMany(Bracket::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(GameMatch::class);
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'event_teams');
    }
}
