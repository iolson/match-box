<?php

use App\Models\User;

it('can list events', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/events')
        ->assertSuccessful();
});

it('can render event create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/events/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from events list', function () {
    $this->get('/admin/events')->assertRedirect('/admin/login');
});

it('redirects non-admin users from events list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/events')
        ->assertForbidden();
});

it('can render event edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $event = \App\Models\Event::create(['name' => 'Test Event']);

    $this->actingAs($user)
        ->get("/admin/events/{$event->id}/edit")
        ->assertSuccessful();
});
