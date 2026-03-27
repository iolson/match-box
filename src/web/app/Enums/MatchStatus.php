<?php

namespace App\Enums;

enum MatchStatus: string
{
    case NotStarted = 'not_started';
    case Starting = 'starting';
    case Warmup = 'warmup';
    case KnifeRound = 'knife_round';
    case EndKnife = 'end_knife';
    case WarmupFirstHalf = 'warmup_first_half';
    case FirstHalf = 'first_half';
    case WarmupSecondHalf = 'warmup_second_half';
    case SecondHalf = 'second_half';
    case WarmupOtFirstHalf = 'warmup_ot_first_half';
    case OtFirstHalf = 'ot_first_half';
    case WarmupOtSecondHalf = 'warmup_ot_second_half';
    case OtSecondHalf = 'ot_second_half';
    case EndMatch = 'end_match';
    case Archived = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::NotStarted => 'Not Started',
            self::Starting => 'Starting',
            self::Warmup => 'Warmup',
            self::KnifeRound => 'Knife Round',
            self::EndKnife => 'End Knife',
            self::WarmupFirstHalf => 'Warmup (1st Half)',
            self::FirstHalf => '1st Half',
            self::WarmupSecondHalf => 'Warmup (2nd Half)',
            self::SecondHalf => '2nd Half',
            self::WarmupOtFirstHalf => 'Warmup (OT 1st Half)',
            self::OtFirstHalf => 'OT 1st Half',
            self::WarmupOtSecondHalf => 'Warmup (OT 2nd Half)',
            self::OtSecondHalf => 'OT 2nd Half',
            self::EndMatch => 'Ended',
            self::Archived => 'Archived',
        };
    }
}
