<?php

use App\Models\MapScore;
use App\Models\MatchMap;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $mapScore = new MapScore();
    expect($mapScore->getFillable())->toContain('match_map_id', 'half', 'team_a_score', 'team_b_score');
});

it('casts attributes correctly', function () {
    $mapScore = new MapScore();
    expect($mapScore->getCasts())->toBeArray();
});

it('has matchMap relationship', function () {
    $mapScore = new MapScore();
    expect($mapScore->matchMap())->toBeInstanceOf(BelongsTo::class);
});
