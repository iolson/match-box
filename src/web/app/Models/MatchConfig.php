<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchConfig extends Model
{
    protected $fillable = [
        'name',
        'best_of',
        'max_rounds',
        'overtime_start_money',
        'overtime_max_rounds',
        'overtime_enabled',
        'knife_round_enabled',
        'streamer_mode',
        'heatmap_enabled',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'overtime_enabled' => 'boolean',
            'knife_round_enabled' => 'boolean',
            'streamer_mode' => 'boolean',
            'heatmap_enabled' => 'boolean',
            'is_default' => 'boolean',
        ];
    }
}
