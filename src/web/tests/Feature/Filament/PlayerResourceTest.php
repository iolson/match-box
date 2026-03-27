<?php

use App\Models\User;

it('can list players', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/players')
        ->assertSuccessful();
});

it('can render player create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/players/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from players list', function () {
    $this->get('/admin/players')->assertRedirect('/admin/login');
});

it('redirects non-admin users from players list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/players')
        ->assertForbidden();
});

it('can render player edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $player = \App\Models\Player::create(['steam_id' => '76561198000000001', 'name' => 'Test Player']);

    $this->actingAs($user)
        ->get("/admin/players/{$player->id}/edit")
        ->assertSuccessful();
});
