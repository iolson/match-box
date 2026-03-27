<?php

namespace App\Enums;

enum MatchMapStatus: string
{
    case Pending = 'pending';
    case Warmup = 'warmup';
    case Knife = 'knife';
    case Live = 'live';
    case Overtime = 'overtime';
    case Finished = 'finished';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Warmup => 'Warmup',
            self::Knife => 'Knife Round',
            self::Live => 'Live',
            self::Overtime => 'Overtime',
            self::Finished => 'Finished',
        };
    }
}
