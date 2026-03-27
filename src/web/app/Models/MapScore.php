<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MapScore extends Model
{
    protected $fillable = [
        'match_map_id',
        'half',
        'team_a_score',
        'team_b_score',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function matchMap(): BelongsTo
    {
        return $this->belongsTo(MatchMap::class);
    }
}
