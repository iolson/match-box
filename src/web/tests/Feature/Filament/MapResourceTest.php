<?php

use App\Models\User;

it('can list maps', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/maps')
        ->assertSuccessful();
});

it('can render map create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/maps/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from maps list', function () {
    $this->get('/admin/maps')->assertRedirect('/admin/login');
});

it('redirects non-admin users from maps list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/maps')
        ->assertForbidden();
});

it('can render map edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $map = \App\Models\Map::create(['name' => 'de_dust2_test', 'display_name' => 'Dust II']);

    $this->actingAs($user)
        ->get("/admin/maps/{$map->id}/edit")
        ->assertSuccessful();
});
