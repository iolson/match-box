<?php

use App\Enums\MatchMapStatus;
use App\Models\GameMatch;
use App\Models\HeatmapPoint;
use App\Models\Kill;
use App\Models\MapScore;
use App\Models\MatchMap;
use App\Models\MatchPlayer;
use App\Models\RoundEvent;
use App\Models\RoundSummary;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $matchMap = new MatchMap();
    expect($matchMap->getFillable())->toContain(
        'match_id',
        'map_name',
        'map_order',
        'score_team_a',
        'score_team_b',
        'status',
        'current_side',
        'overtime_count',
        'demo_file_path'
    );
});

it('casts attributes correctly', function () {
    $matchMap = new MatchMap();
    $casts = $matchMap->getCasts();
    expect($casts)->toHaveKey('status')
        ->and($casts['status'])->toBe(MatchMapStatus::class);
});

it('has match relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->match())->toBeInstanceOf(BelongsTo::class);
});

it('has mapScores relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->mapScores())->toBeInstanceOf(HasMany::class);
});

it('has matchPlayers relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->matchPlayers())->toBeInstanceOf(HasMany::class);
});

it('has kills relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->kills())->toBeInstanceOf(HasMany::class);
});

it('has roundEvents relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->roundEvents())->toBeInstanceOf(HasMany::class);
});

it('has roundSummaries relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->roundSummaries())->toBeInstanceOf(HasMany::class);
});

it('has heatmapPoints relationship', function () {
    $matchMap = new MatchMap();
    expect($matchMap->heatmapPoints())->toBeInstanceOf(HasMany::class);
});
