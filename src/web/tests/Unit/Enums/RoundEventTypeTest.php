<?php

use App\Enums\RoundEventType;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(RoundEventType::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 9 cases', function () {
    expect(RoundEventType::cases())->toHaveCount(9);
});

it('has correct values', function () {
    expect(RoundEventType::Kill->value)->toBe('kill');
    expect(RoundEventType::BombPlant->value)->toBe('bomb_plant');
    expect(RoundEventType::BombDefuse->value)->toBe('bomb_defuse');
    expect(RoundEventType::BombExplode->value)->toBe('bomb_explode');
    expect(RoundEventType::RoundStart->value)->toBe('round_start');
    expect(RoundEventType::RoundEnd->value)->toBe('round_end');
    expect(RoundEventType::PlayerConnect->value)->toBe('player_connect');
    expect(RoundEventType::PlayerDisconnect->value)->toBe('player_disconnect');
    expect(RoundEventType::Timeout->value)->toBe('timeout');
});

it('has labels for all cases', function () {
    foreach (RoundEventType::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
