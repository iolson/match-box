<?php

use App\Models\User;

// MatchResource has an explicit $slug = 'matches', so the admin URL is /admin/matches.

it('can list matches', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/matches')
        ->assertSuccessful();
});

it('can render match create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/matches/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from matches list', function () {
    $this->get('/admin/matches')->assertRedirect('/admin/login');
});

it('redirects non-admin users from matches list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/matches')
        ->assertForbidden();
});

it('can render match edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $uuid = (string) \Illuminate\Support\Str::uuid();
    \App\Models\GameMatch::create(['uuid' => $uuid]);

    $this->actingAs($user)
        ->get("/admin/matches/{$uuid}/edit")
        ->assertSuccessful();
});
