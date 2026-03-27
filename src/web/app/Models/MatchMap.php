<?php

namespace App\Models;

use App\Enums\MatchMapStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatchMap extends Model
{
    protected $fillable = [
        'match_id',
        'map_name',
        'map_order',
        'score_team_a',
        'score_team_b',
        'status',
        'current_side',
        'overtime_count',
        'demo_file_path',
    ];

    protected function casts(): array
    {
        return [
            'status' => MatchMapStatus::class,
        ];
    }

    public function match(): BelongsTo
    {
        return $this->belongsTo(GameMatch::class);
    }

    public function mapScores(): HasMany
    {
        return $this->hasMany(MapScore::class);
    }

    public function matchPlayers(): HasMany
    {
        return $this->hasMany(MatchPlayer::class);
    }

    public function kills(): HasMany
    {
        return $this->hasMany(Kill::class);
    }

    public function roundEvents(): HasMany
    {
        return $this->hasMany(RoundEvent::class);
    }

    public function roundSummaries(): HasMany
    {
        return $this->hasMany(RoundSummary::class);
    }

    public function heatmapPoints(): HasMany
    {
        return $this->hasMany(HeatmapPoint::class);
    }
}
