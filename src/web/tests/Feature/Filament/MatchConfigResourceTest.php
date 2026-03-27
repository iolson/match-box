<?php

use App\Models\User;

// MatchConfigResource has $modelLabel = 'Match Config'.
// Filament derives the slug from the resource class name: MatchConfigResource -> match-configs.

it('can list match configs', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/match-configs')
        ->assertSuccessful();
});

it('can render match config create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/match-configs/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from match configs list', function () {
    $this->get('/admin/match-configs')->assertRedirect('/admin/login');
});

it('redirects non-admin users from match configs list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/match-configs')
        ->assertForbidden();
});

it('can render match config edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $config = \App\Models\MatchConfig::create(['name' => 'Test Config']);

    $this->actingAs($user)
        ->get("/admin/match-configs/{$config->id}/edit")
        ->assertSuccessful();
});
