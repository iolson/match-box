<?php

use App\Models\Event;
use App\Models\GameMatch;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Str;

it('returns 200 for home page', function () {
    $this->get('/')->assertStatus(200);
});

it('returns 200 for matches index', function () {
    $this->get('/matches')->assertStatus(200);
});

it('returns 200 for match show', function () {
    $uuid = (string) Str::uuid();
    GameMatch::create(['uuid' => $uuid]);

    $this->get("/matches/{$uuid}")->assertStatus(200);
});

it('returns 200 for events index', function () {
    $this->get('/events')->assertStatus(200);
});

it('returns 200 for event show', function () {
    $event = Event::create(['name' => 'Test Event']);

    $this->get("/events/{$event->id}")->assertStatus(200);
});

it('returns 200 for teams index', function () {
    $this->get('/teams')->assertStatus(200);
});

it('returns 200 for team show', function () {
    $team = Team::create(['name' => 'Test Team']);

    $this->get("/teams/{$team->id}")->assertStatus(200);
});

it('returns 200 for player show', function () {
    $player = Player::create([
        'steam_id' => '76561198000000001',
        'name' => 'Test Player',
    ]);

    $this->get("/players/{$player->id}")->assertStatus(200);
});

it('returns 200 for screen show', function () {
    $event = Event::create(['name' => 'Screen Event']);

    $this->get("/screen/{$event->id}")->assertStatus(200);
});
