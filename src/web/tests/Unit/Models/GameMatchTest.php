<?php

use App\Enums\MapSelectionMode;
use App\Enums\MatchStatus;
use App\Models\Bracket;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\GameMatch;
use App\Models\Group;
use App\Models\HeatmapPoint;
use App\Models\Kill;
use App\Models\MatchMap;
use App\Models\MatchPlayer;
use App\Models\RoundEvent;
use App\Models\RoundSummary;
use App\Models\Server;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('uses the matches table', function () {
    $match = new GameMatch();
    expect($match->getTable())->toBe('matches');
});

it('uses uuid as route key', function () {
    $match = new GameMatch();
    expect($match->getRouteKeyName())->toBe('uuid');
});

it('has fillable attributes', function () {
    $match = new GameMatch();
    expect($match->getFillable())->toContain(
        'uuid',
        'server_id',
        'event_id',
        'team_a_id',
        'team_b_id',
        'status',
        'score_a',
        'score_b',
        'best_of',
        'map_selection_mode',
        'auth_key'
    );
});

it('casts attributes correctly', function () {
    $match = new GameMatch();
    $casts = $match->getCasts();
    expect($casts)->toHaveKey('status')
        ->and($casts['status'])->toBe(MatchStatus::class)
        ->and($casts)->toHaveKey('map_selection_mode')
        ->and($casts['map_selection_mode'])->toBe(MapSelectionMode::class)
        ->and($casts)->toHaveKey('is_paused')
        ->and($casts['is_paused'])->toBe('boolean')
        ->and($casts)->toHaveKey('overtime_enabled')
        ->and($casts['overtime_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('knife_round_enabled')
        ->and($casts['knife_round_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('auto_switch_sides')
        ->and($casts['auto_switch_sides'])->toBe('boolean')
        ->and($casts)->toHaveKey('streamer_mode')
        ->and($casts['streamer_mode'])->toBe('boolean')
        ->and($casts)->toHaveKey('heatmap_enabled')
        ->and($casts['heatmap_enabled'])->toBe('boolean')
        ->and($casts)->toHaveKey('scheduled_at')
        ->and($casts['scheduled_at'])->toBe('datetime')
        ->and($casts)->toHaveKey('started_at')
        ->and($casts['started_at'])->toBe('datetime')
        ->and($casts)->toHaveKey('ended_at')
        ->and($casts['ended_at'])->toBe('datetime');
});

it('has server relationship', function () {
    $match = new GameMatch();
    expect($match->server())->toBeInstanceOf(BelongsTo::class);
});

it('has event relationship', function () {
    $match = new GameMatch();
    expect($match->event())->toBeInstanceOf(BelongsTo::class);
});

it('has group relationship', function () {
    $match = new GameMatch();
    expect($match->group())->toBeInstanceOf(BelongsTo::class);
});

it('has bracket relationship', function () {
    $match = new GameMatch();
    expect($match->bracket())->toBeInstanceOf(BelongsTo::class);
});

it('has teamA relationship', function () {
    $match = new GameMatch();
    expect($match->teamA())->toBeInstanceOf(BelongsTo::class);
});

it('has teamB relationship', function () {
    $match = new GameMatch();
    expect($match->teamB())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMaps relationship', function () {
    $match = new GameMatch();
    expect($match->matchMaps())->toBeInstanceOf(HasMany::class);
});

it('has matchPlayers relationship', function () {
    $match = new GameMatch();
    expect($match->matchPlayers())->toBeInstanceOf(HasMany::class);
});

it('has kills relationship', function () {
    $match = new GameMatch();
    expect($match->kills())->toBeInstanceOf(HasMany::class);
});

it('has roundEvents relationship', function () {
    $match = new GameMatch();
    expect($match->roundEvents())->toBeInstanceOf(HasMany::class);
});

it('has roundSummaries relationship', function () {
    $match = new GameMatch();
    expect($match->roundSummaries())->toBeInstanceOf(HasMany::class);
});

it('has heatmapPoints relationship', function () {
    $match = new GameMatch();
    expect($match->heatmapPoints())->toBeInstanceOf(HasMany::class);
});
