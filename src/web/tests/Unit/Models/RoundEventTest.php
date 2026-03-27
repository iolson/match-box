<?php

use App\Enums\RoundEventType;
use App\Models\GameMatch;
use App\Models\Kill;
use App\Models\MatchMap;
use App\Models\RoundEvent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $event = new RoundEvent();
    expect($event->getFillable())->toContain(
        'match_id',
        'match_map_id',
        'round_number',
        'event_type',
        'event_data',
        'event_time',
        'kill_id'
    );
});

it('casts attributes correctly', function () {
    $event = new RoundEvent();
    $casts = $event->getCasts();
    expect($casts)->toHaveKey('event_type')
        ->and($casts['event_type'])->toBe(RoundEventType::class)
        ->and($casts)->toHaveKey('event_data')
        ->and($casts['event_data'])->toBe('array')
        ->and($casts)->toHaveKey('event_time')
        ->and($casts['event_time'])->toBe('datetime');
});

it('has match relationship', function () {
    $event = new RoundEvent();
    expect($event->match())->toBeInstanceOf(BelongsTo::class);
});

it('has matchMap relationship', function () {
    $event = new RoundEvent();
    expect($event->matchMap())->toBeInstanceOf(BelongsTo::class);
});

it('has kill relationship', function () {
    $event = new RoundEvent();
    expect($event->kill())->toBeInstanceOf(BelongsTo::class);
});
