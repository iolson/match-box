<?php

use App\Models\GameMatch;
use App\Models\Kill;
use App\Models\MatchMap;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $kill = new Kill();
    expect($kill->getFillable())->toContain(
        'match_id',
        'match_map_id',
        'round_number',
        'killer_steam_id',
        'killer_name',
        'victim_steam_id',
        'victim_name',
        'weapon',
        'is_headshot',
        'event_time'
    );
});

it('casts attributes correctly', function () {
    $kill = new Kill();
    $casts = $kill->getCasts();
    expect($casts)->toHaveKey('is_headshot')
        ->and($casts['is_headshot'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_wallbang')
        ->and($casts['is_wallbang'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_noscope')
        ->and($casts['is_noscope'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_through_smoke')
        ->and($casts['is_through_smoke'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_blind_kill')
        ->and($casts['is_blind_kill'])->toBe('boolean')
        ->and($casts)->toHaveKey('is_entry_kill')
        ->and($casts['is_entry_kill'])->toBe('boolean')
        ->and($casts)->toHaveKey('event_time')
        ->and($casts['event_time'])->toBe('datetime');
});

it('has match relationship', function () {
    $kill = new Kill();
    expect($kill->match())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMap relationship', function () {
    $kill = new Kill();
    expect($kill->matchMap())->toBeInstanceOf(BelongsTo::class);
});
