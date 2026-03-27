<?php

use App\Models\GameMatch;
use App\Models\MatchMap;
use App\Models\MatchPlayer;
use App\Models\Player;
use App\Models\PlayerSnapshot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->getFillable())->toContain(
        'match_id',
        'match_map_id',
        'player_id',
        'steam_id',
        'name',
        'team_side',
        'kills',
        'assists',
        'deaths',
        'headshots',
        'rating'
    );
});

it('casts attributes correctly', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->getCasts())->toBeArray();
});

it('has match relationship', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->match())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMap relationship', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->matchMap())->toBeInstanceOf(BelongsTo::class);
});

it('has player relationship', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->player())->toBeInstanceOf(BelongsTo::class);
});

it('has playerSnapshots relationship', function () {
    $matchPlayer = new MatchPlayer();
    expect($matchPlayer->playerSnapshots())->toBeInstanceOf(HasMany::class);
});
