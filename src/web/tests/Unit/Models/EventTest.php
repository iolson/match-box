<?php

use App\Models\Announcement;
use App\Models\Bracket;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\GameMatch;
use App\Models\Group;
use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $event = new Event();
    expect($event->getFillable())->toContain('name', 'description', 'location', 'start_date', 'end_date', 'is_active');
});

it('casts attributes correctly', function () {
    $event = new Event();
    $casts = $event->getCasts();
    expect($casts)->toHaveKey('start_date')
        ->and($casts['start_date'])->toBe('date')
        ->and($casts)->toHaveKey('end_date')
        ->and($casts['end_date'])->toBe('date')
        ->and($casts)->toHaveKey('is_active')
        ->and($casts['is_active'])->toBe('boolean');
});

it('has eventTeams relationship', function () {
    $event = new Event();
    expect($event->eventTeams())->toBeInstanceOf(HasMany::class);
});

it('has groups relationship', function () {
    $event = new Event();
    expect($event->groups())->toBeInstanceOf(HasMany::class);
});

it('has brackets relationship', function () {
    $event = new Event();
    expect($event->brackets())->toBeInstanceOf(HasMany::class);
});

it('has matches relationship', function () {
    $event = new Event();
    expect($event->matches())->toBeInstanceOf(HasMany::class);
});

it('has announcements relationship', function () {
    $event = new Event();
    expect($event->announcements())->toBeInstanceOf(HasMany::class);
});

it('has teams relationship', function () {
    $event = new Event();
    expect($event->teams())->toBeInstanceOf(BelongsToMany::class);
});
