<?php

namespace App\Models;

use App\Enums\MapSelectionMode;
use App\Enums\MatchStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameMatch extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'uuid',
        'server_id',
        'event_id',
        'group_id',
        'bracket_id',
        'team_a_id',
        'team_b_id',
        'team_a_name',
        'team_b_name',
        'team_a_country',
        'team_b_country',
        'status',
        'is_paused',
        'score_a',
        'score_b',
        'best_of',
        'max_rounds',
        'overtime_start_money',
        'overtime_max_rounds',
        'overtime_enabled',
        'knife_round_enabled',
        'auto_switch_sides',
        'streamer_mode',
        'heatmap_enabled',
        'map_selection_mode',
        'scheduled_at',
        'started_at',
        'ended_at',
        'bracket_round',
        'bracket_position',
        'auth_key',
    ];

    protected function casts(): array
    {
        return [
            'status' => MatchStatus::class,
            'map_selection_mode' => MapSelectionMode::class,
            'is_paused' => 'boolean',
            'overtime_enabled' => 'boolean',
            'knife_round_enabled' => 'boolean',
            'auto_switch_sides' => 'boolean',
            'streamer_mode' => 'boolean',
            'heatmap_enabled' => 'boolean',
            'scheduled_at' => 'datetime',
            'started_at' => 'datetime',
            'ended_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function bracket(): BelongsTo
    {
        return $this->belongsTo(Bracket::class);
    }

    public function teamA(): BelongsTo
    {
        return $this->belongsTo(EventTeam::class, 'team_a_id');
    }

    public function teamB(): BelongsTo
    {
        return $this->belongsTo(EventTeam::class, 'team_b_id');
    }

    public function matchMaps(): HasMany
    {
        return $this->hasMany(MatchMap::class);
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
