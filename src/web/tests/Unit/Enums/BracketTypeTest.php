<?php

use App\Enums\BracketType;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(BracketType::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 3 cases', function () {
    expect(BracketType::cases())->toHaveCount(3);
});

it('has correct values', function () {
    expect(BracketType::SingleElimination->value)->toBe('single_elimination');
    expect(BracketType::DoubleElimination->value)->toBe('double_elimination');
    expect(BracketType::Swiss->value)->toBe('swiss');
});

it('has labels for all cases', function () {
    foreach (BracketType::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
