<?php

use App\Enums\WinType;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(WinType::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 4 cases', function () {
    expect(WinType::cases())->toHaveCount(4);
});

it('has correct values', function () {
    expect(WinType::BombExploded->value)->toBe('bomb_exploded');
    expect(WinType::BombDefused->value)->toBe('bomb_defused');
    expect(WinType::Elimination->value)->toBe('elimination');
    expect(WinType::TimeExpired->value)->toBe('time_expired');
});

it('has labels for all cases', function () {
    foreach (WinType::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
