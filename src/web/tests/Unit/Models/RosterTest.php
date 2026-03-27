<?php

use App\Models\EventTeam;
use App\Models\Player;
use App\Models\Roster;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

it('has fillable attributes', function () {
    $roster = new Roster();
    expect($roster->getFillable())->toContain('event_team_id', 'player_id', 'is_captain');
});

it('casts attributes correctly', function () {
    $roster = new Roster();
    $casts = $roster->getCasts();
    expect($casts)->toHaveKey('is_captain')
        ->and($casts['is_captain'])->toBe('boolean');
});

it('has eventTeam relationship', function () {
    $roster = new Roster();
    expect($roster->eventTeam())->toBeInstanceOf(BelongsTo::class);
});

it('has player relationship', function () {
    $roster = new Roster();
    expect($roster->player())->toBeInstanceOf(BelongsTo::class);
});
