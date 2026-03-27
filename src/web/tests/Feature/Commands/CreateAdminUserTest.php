<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

it('creates an admin user with flags', function () {
    $this->artisan('matchbox:create-admin', [
        '--name' => 'Test Admin',
        '--email' => 'admin@test.com',
        '--password' => 'secret123',
    ])
        ->expectsOutputToContain('created')
        ->assertExitCode(0);

    $user = User::where('email', 'admin@test.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Test Admin')
        ->and($user->is_admin)->toBeTrue()
        ->and(Hash::check('secret123', $user->password))->toBeTrue();
});

it('updates an existing admin user', function () {
    User::factory()->create([
        'email' => 'admin@test.com',
        'name' => 'Old Name',
        'is_admin' => false,
    ]);

    $this->artisan('matchbox:create-admin', [
        '--name' => 'New Name',
        '--email' => 'admin@test.com',
        '--password' => 'newpass',
    ])
        ->expectsOutputToContain('updated')
        ->assertExitCode(0);

    $user = User::where('email', 'admin@test.com')->first();

    expect($user->name)->toBe('New Name')
        ->and($user->is_admin)->toBeTrue()
        ->and(Hash::check('newpass', $user->password))->toBeTrue();
});

it('reads from config when no flags provided', function () {
    config([
        'matchbox.admin.name' => 'Config Admin',
        'matchbox.admin.email' => 'config@test.com',
        'matchbox.admin.password' => 'configpass',
    ]);

    $this->artisan('matchbox:create-admin')
        ->expectsOutputToContain('created')
        ->assertExitCode(0);

    $user = User::where('email', 'config@test.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Config Admin')
        ->and(Hash::check('configpass', $user->password))->toBeTrue();
});

it('prompts interactively when no flags or config', function () {
    config([
        'matchbox.admin.name' => null,
        'matchbox.admin.email' => null,
        'matchbox.admin.password' => null,
    ]);

    $this->artisan('matchbox:create-admin')
        ->expectsQuestion('Name', 'Interactive Admin')
        ->expectsQuestion('Email', 'interactive@test.com')
        ->expectsQuestion('Password', 'interactivepass')
        ->expectsOutputToContain('created')
        ->assertExitCode(0);

    $user = User::where('email', 'interactive@test.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Interactive Admin');
});
