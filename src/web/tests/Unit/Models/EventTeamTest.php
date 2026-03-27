<?php

use App\Models\Event;
use App\Models\EventTeam;
use App\Models\GameMatch;
use App\Models\GroupStanding;
use App\Models\Roster;
use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

it('has fillable attributes', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->getFillable())->toContain('event_id', 'team_id', 'seed', 'group');
});

it('casts attributes correctly', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->getCasts())->toBeArray();
});

it('has event relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->event())->toBeInstanceOf(BelongsTo::class);
});

it('has team relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->team())->toBeInstanceOf(BelongsTo::class);
});

it('has rosters relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->rosters())->toBeInstanceOf(HasMany::class);
});

it('has groupStanding relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->groupStanding())->toBeInstanceOf(HasOne::class);
});

it('has matchesAsTeamA relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->matchesAsTeamA())->toBeInstanceOf(HasMany::class);
});

it('has matchesAsTeamB relationship', function () {
    $eventTeam = new EventTeam();
    expect($eventTeam->matchesAsTeamB())->toBeInstanceOf(HasMany::class);
});
