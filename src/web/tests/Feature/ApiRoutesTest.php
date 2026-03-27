<?php

use App\Models\Event;
use App\Models\GameMatch;
use Illuminate\Support\Str;

it('GET /api/v1/matches returns JSON', function () {
    $this->getJson('/api/v1/matches')
        ->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
});

it('GET /api/v1/matches returns a single match as JSON', function () {
    $uuid = (string) Str::uuid();
    GameMatch::create(['uuid' => $uuid]);

    $this->getJson("/api/v1/matches/{$uuid}")
        ->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
});

it('GET /api/v1/events returns JSON', function () {
    $this->getJson('/api/v1/events')
        ->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
});

it('GET /api/v1/events returns a single event as JSON', function () {
    $event = Event::create(['name' => 'API Event']);

    $this->getJson("/api/v1/events/{$event->id}")
        ->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
});

it('GET /api/v1/screen/{event} returns JSON', function () {
    $event = Event::create(['name' => 'Screen Event']);

    $this->getJson("/api/v1/screen/{$event->id}")
        ->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
});

it('POST /api/v1/log-receiver returns 401 without auth token', function () {
    $this->postJson('/api/v1/log-receiver', [])
        ->assertStatus(401);
});

it('POST /api/v1/log-receiver accepts valid data with auth', function () {
    \Laravel\Sanctum\Sanctum::actingAs(\App\Models\User::factory()->create());

    $this->postJson('/api/v1/log-receiver', [
        'auth_key'   => 'test-key',
        'event_type' => 'round_end',
    ])->assertStatus(200)->assertJson(['status' => 'ok']);
});

it('POST /api/v1/log-receiver returns 422 when fields are missing', function () {
    \Laravel\Sanctum\Sanctum::actingAs(\App\Models\User::factory()->create());

    $this->postJson('/api/v1/log-receiver', [])
        ->assertStatus(422);
});
