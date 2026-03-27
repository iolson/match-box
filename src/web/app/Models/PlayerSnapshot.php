<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerSnapshot extends Model
{
    protected $fillable = [
        'match_player_id',
        'round_number',
        'kills',
        'assists',
        'deaths',
        'headshots',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function matchPlayer(): BelongsTo
    {
        return $this->belongsTo(MatchPlayer::class);
    }
}
