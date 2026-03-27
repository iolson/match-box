<?php

use App\Enums\MapSelectionMode;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(MapSelectionMode::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 4 cases', function () {
    expect(MapSelectionMode::cases())->toHaveCount(4);
});

it('has correct values', function () {
    expect(MapSelectionMode::Manual->value)->toBe('manual');
    expect(MapSelectionMode::Random->value)->toBe('random');
    expect(MapSelectionMode::PickBan->value)->toBe('pick_ban');
    expect(MapSelectionMode::Vote->value)->toBe('vote');
});

it('has labels for all cases', function () {
    foreach (MapSelectionMode::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
