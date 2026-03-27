<?php

use App\Models\User;

it('can list announcements', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/announcements')
        ->assertSuccessful();
});

it('can render announcement create form', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $this->actingAs($user)
        ->get('/admin/announcements/create')
        ->assertSuccessful();
});

it('redirects unauthenticated users from announcements list', function () {
    $this->get('/admin/announcements')->assertRedirect('/admin/login');
});

it('redirects non-admin users from announcements list', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/announcements')
        ->assertForbidden();
});

it('can render announcement edit form', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $announcement = \App\Models\Announcement::create(['message' => 'Test announcement message']);

    $this->actingAs($user)
        ->get("/admin/announcements/{$announcement->id}/edit")
        ->assertSuccessful();
});
