<?php

namespace App\Models;

use App\Enums\WinType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoundSummary extends Model
{
    protected $fillable = [
        'match_id',
        'match_map_id',
        'round_number',
        'win_type',
        'winning_team',
        'winning_side',
        'bomb_planted',
        'bomb_defused',
        'bomb_exploded',
        'score_a',
        'score_b',
        'backup_file',
    ];

    protected function casts(): array
    {
        return [
            'win_type' => WinType::class,
            'bomb_planted' => 'boolean',
            'bomb_defused' => 'boolean',
            'bomb_exploded' => 'boolean',
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
}
