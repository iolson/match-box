<?php

namespace App\Models;

use App\Enums\RoundEventType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoundEvent extends Model
{
    protected $fillable = [
        'match_id',
        'match_map_id',
        'round_number',
        'event_type',
        'event_data',
        'event_time',
        'kill_id',
    ];

    protected function casts(): array
    {
        return [
            'event_type' => RoundEventType::class,
            'event_data' => 'array',
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

    public function kill(): BelongsTo
    {
        return $this->belongsTo(Kill::class);
    }
}
