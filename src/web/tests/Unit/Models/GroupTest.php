<?php

use App\Models\Event;
use App\Models\GameMatch;
use App\Models\Group;
use App\Models\GroupStanding;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $group = new Group();
    expect($group->getFillable())->toContain('event_id', 'name', 'sort_order');
});

it('casts attributes correctly', function () {
    $group = new Group();
    expect($group->getCasts())->toBeArray();
});

it('has event relationship', function () {
    $group = new Group();
    expect($group->event())->toBeInstanceOf(BelongsTo::class);
});

it('has groupStandings relationship', function () {
    $group = new Group();
    expect($group->groupStandings())->toBeInstanceOf(HasMany::class);
});

it('has matches relationship', function () {
    $group = new Group();
    expect($group->matches())->toBeInstanceOf(HasMany::class);
});
