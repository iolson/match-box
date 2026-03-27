<?php

use App\Filament\Resources\EventResource\RelationManagers\BracketsRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\EventTeamsRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\GroupsRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\RostersRelationManager;
use App\Models\Event;
use App\Models\EventTeam;
use App\Models\Team;
use App\Models\User;
use Livewire\Livewire;

it('can render event teams relation manager', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $event = Event::create(['name' => 'Test Event']);

    $this->actingAs($user);

    Livewire::test(EventTeamsRelationManager::class, [
        'ownerRecord' => $event,
        'pageClass' => \App\Filament\Resources\EventResource\Pages\EditEvent::class,
    ])->assertSuccessful();
});

it('can render groups relation manager', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $event = Event::create(['name' => 'Test Event']);

    $this->actingAs($user);

    Livewire::test(GroupsRelationManager::class, [
        'ownerRecord' => $event,
        'pageClass' => \App\Filament\Resources\EventResource\Pages\EditEvent::class,
    ])->assertSuccessful();
});

it('can render brackets relation manager', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $event = Event::create(['name' => 'Test Event']);

    $this->actingAs($user);

    Livewire::test(BracketsRelationManager::class, [
        'ownerRecord' => $event,
        'pageClass' => \App\Filament\Resources\EventResource\Pages\EditEvent::class,
    ])->assertSuccessful();
});

it('can render rosters relation manager', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $event = Event::create(['name' => 'Test Event']);
    $team = Team::create(['name' => 'Test Team']);
    $eventTeam = EventTeam::create(['event_id' => $event->id, 'team_id' => $team->id]);

    $this->actingAs($user);

    Livewire::test(RostersRelationManager::class, [
        'ownerRecord' => $eventTeam,
        'pageClass' => \App\Filament\Resources\EventResource\Pages\EditEvent::class,
    ])->assertSuccessful();
});
