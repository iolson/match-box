<?php

use App\Enums\BracketType;
use App\Models\Bracket;
use App\Models\Event;
use App\Models\GameMatch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $bracket = new Bracket();
    expect($bracket->getFillable())->toContain('event_id', 'name', 'type', 'sort_order');
});

it('casts attributes correctly', function () {
    $bracket = new Bracket();
    $casts = $bracket->getCasts();
    expect($casts)->toHaveKey('type')
        ->and($casts['type'])->toBe(BracketType::class);
});

it('has event relationship', function () {
    $bracket = new Bracket();
    expect($bracket->event())->toBeInstanceOf(BelongsTo::class);
});

it('has matches relationship', function () {
    $bracket = new Bracket();
    expect($bracket->matches())->toBeInstanceOf(HasMany::class);
});
