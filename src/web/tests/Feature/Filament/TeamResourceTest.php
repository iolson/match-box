<?php

use App\Models\User;

it('can list teams', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/teams')
        ->assertSuccessful();
});

it('can render team create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/teams/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from teams list', function () {
    $this->get('/admin/teams')->assertRedirect('/admin/login');
});

it('redirects non-admin users from teams list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/teams')
        ->assertForbidden();
});

it('can render team edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $team = \App\Models\Team::create(['name' => 'Test Team']);

    $this->actingAs($user)
        ->get("/admin/teams/{$team->id}/edit")
        ->assertSuccessful();
});
