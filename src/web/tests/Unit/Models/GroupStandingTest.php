<?php

use App\Models\EventTeam;
use App\Models\Group;
use App\Models\GroupStanding;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $standing = new GroupStanding();
    expect($standing->getFillable())->toContain(
        'group_id',
        'event_team_id',
        'wins',
        'losses',
        'draws',
        'round_diff',
        'buchholz',
        'tiebreaker_rank'
    );
});

it('casts attributes correctly', function () {
    $standing = new GroupStanding();
    expect($standing->getCasts())->toBeArray();
});

it('has group relationship', function () {
    $standing = new GroupStanding();
    expect($standing->group())->toBeInstanceOf(BelongsTo::class);
});

it('has eventTeam relationship', function () {
    $standing = new GroupStanding();
    expect($standing->eventTeam())->toBeInstanceOf(BelongsTo::class);
});
