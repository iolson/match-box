<?php

namespace App\Models;

use App\Enums\BracketType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bracket extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'type',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'type' => BracketType::class,
        ];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(GameMatch::class);
    }
}
