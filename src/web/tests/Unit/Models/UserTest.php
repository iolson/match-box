<?php

use App\Models\User;

it('has fillable attributes', function () {
    $user = new User();
    expect($user->getFillable())->toContain('name', 'email', 'password', 'is_admin');
});

it('hides sensitive attributes', function () {
    $user = new User();
    expect($user->getHidden())->toContain('password', 'remember_token');
});

it('casts attributes correctly', function () {
    $user = new User();
    $casts = $user->getCasts();
    expect($casts)->toHaveKey('email_verified_at')
        ->and($casts['email_verified_at'])->toBe('datetime')
        ->and($casts)->toHaveKey('password')
        ->and($casts['password'])->toBe('hashed')
        ->and($casts)->toHaveKey('is_admin')
        ->and($casts['is_admin'])->toBe('boolean');
});
