<?php

use App\Models\MatchPlayer;
use App\Models\PlayerSnapshot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $snapshot = new PlayerSnapshot();
    expect($snapshot->getFillable())->toContain(
        'match_player_id',
        'round_number',
        'kills',
        'assists',
        'deaths',
        'headshots'
    );
});

it('casts attributes correctly', function () {
    $snapshot = new PlayerSnapshot();
    expect($snapshot->getCasts())->toBeArray();
});

it('has matchPlayer relationship', function () {
    $snapshot = new PlayerSnapshot();
    expect($snapshot->matchPlayer())->toBeInstanceOf(BelongsTo::class);
});
