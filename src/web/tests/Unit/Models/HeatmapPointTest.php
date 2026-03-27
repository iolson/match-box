<?php

use App\Models\GameMatch;
use App\Models\HeatmapPoint;
use App\Models\MatchMap;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $point = new HeatmapPoint();
    expect($point->getFillable())->toContain(
        'match_id',
        'match_map_id',
        'round_number',
        'event_type',
        'x',
        'y',
        'z',
        'player_steam_id',
        'player_name',
        'attacker_steam_id',
        'attacker_name',
        'round_time'
    );
});

it('casts attributes correctly', function () {
    $point = new HeatmapPoint();
    expect($point->getCasts())->toBeArray();
});

it('has match relationship', function () {
    $point = new HeatmapPoint();
    expect($point->match())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMap relationship', function () {
    $point = new HeatmapPoint();
    expect($point->matchMap())->toBeInstanceOf(BelongsTo::class);
});
