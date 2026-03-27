<?php

use App\Models\User;

it('can list servers', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/servers')
        ->assertSuccessful();
});

it('can render server create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/servers/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from servers list', function () {
    $this->get('/admin/servers')->assertRedirect('/admin/login');
});

it('redirects non-admin users from servers list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/servers')
        ->assertForbidden();
});

it('can render server edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $server = \App\Models\Server::create(['ip' => '192.168.1.1', 'rcon_password' => 'secret']);

    $this->actingAs($user)
        ->get("/admin/servers/{$server->id}/edit")
        ->assertSuccessful();
});
