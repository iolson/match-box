<?php

namespace App\Enums;

enum BracketType: string
{
    case SingleElimination = 'single_elimination';
    case DoubleElimination = 'double_elimination';
    case Swiss = 'swiss';

    public function label(): string
    {
        return match ($this) {
            self::SingleElimination => 'Single Elimination',
            self::DoubleElimination => 'Double Elimination',
            self::Swiss => 'Swiss',
        };
    }
}
