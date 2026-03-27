<?php

use App\Enums\MatchMapStatus;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(MatchMapStatus::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 6 cases', function () {
    expect(MatchMapStatus::cases())->toHaveCount(6);
});

it('has correct values', function () {
    expect(MatchMapStatus::Pending->value)->toBe('pending');
    expect(MatchMapStatus::Warmup->value)->toBe('warmup');
    expect(MatchMapStatus::Knife->value)->toBe('knife');
    expect(MatchMapStatus::Live->value)->toBe('live');
    expect(MatchMapStatus::Overtime->value)->toBe('overtime');
    expect(MatchMapStatus::Finished->value)->toBe('finished');
});

it('has labels for all cases', function () {
    foreach (MatchMapStatus::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
