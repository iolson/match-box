<?php

use App\Enums\MatchStatus;

it('is a backed string enum', function () {
    $reflection = new ReflectionEnum(MatchStatus::class);
    expect($reflection->isBacked())->toBeTrue();
    expect($reflection->getBackingType()->getName())->toBe('string');
});

it('has 15 cases', function () {
    expect(MatchStatus::cases())->toHaveCount(15);
});

it('has correct values', function () {
    expect(MatchStatus::NotStarted->value)->toBe('not_started');
    expect(MatchStatus::Starting->value)->toBe('starting');
    expect(MatchStatus::Warmup->value)->toBe('warmup');
    expect(MatchStatus::KnifeRound->value)->toBe('knife_round');
    expect(MatchStatus::EndKnife->value)->toBe('end_knife');
    expect(MatchStatus::WarmupFirstHalf->value)->toBe('warmup_first_half');
    expect(MatchStatus::FirstHalf->value)->toBe('first_half');
    expect(MatchStatus::WarmupSecondHalf->value)->toBe('warmup_second_half');
    expect(MatchStatus::SecondHalf->value)->toBe('second_half');
    expect(MatchStatus::WarmupOtFirstHalf->value)->toBe('warmup_ot_first_half');
    expect(MatchStatus::OtFirstHalf->value)->toBe('ot_first_half');
    expect(MatchStatus::WarmupOtSecondHalf->value)->toBe('warmup_ot_second_half');
    expect(MatchStatus::OtSecondHalf->value)->toBe('ot_second_half');
    expect(MatchStatus::EndMatch->value)->toBe('end_match');
    expect(MatchStatus::Archived->value)->toBe('archived');
});

it('has labels for all cases', function () {
    foreach (MatchStatus::cases() as $case) {
        expect($case->label())->toBeString()->not->toBeEmpty();
    }
});
