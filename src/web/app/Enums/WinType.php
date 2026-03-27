<?php

namespace App\Enums;

enum WinType: string
{
    case BombExploded = 'bomb_exploded';
    case BombDefused = 'bomb_defused';
    case Elimination = 'elimination';
    case TimeExpired = 'time_expired';

    public function label(): string
    {
        return match ($this) {
            self::BombExploded => 'Bomb Exploded',
            self::BombDefused => 'Bomb Defused',
            self::Elimination => 'Elimination',
            self::TimeExpired => 'Time Expired',
        };
    }
}
