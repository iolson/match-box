<?php

use App\Models\Event;
use App\Models\EventTeam;
use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $team = new Team();
    expect($team->getFillable())->toContain('name', 'short_name', 'country_code', 'logo_path', 'link');
});

it('casts attributes correctly', function () {
    $team = new Team();
    expect($team->getCasts())->toBeArray();
});

it('has eventTeams relationship', function () {
    $team = new Team();
    expect($team->eventTeams())->toBeInstanceOf(HasMany::class);
});

it('has events relationship', function () {
    $team = new Team();
    expect($team->events())->toBeInstanceOf(BelongsToMany::class);
});
