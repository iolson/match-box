<?php

namespace App\Enums;

enum MapSelectionMode: string
{
    case Manual = 'manual';
    case Random = 'random';
    case PickBan = 'pick_ban';
    case Vote = 'vote';

    public function label(): string
    {
        return match ($this) {
            self::Manual => 'Manual',
            self::Random => 'Random',
            self::PickBan => 'Pick/Ban',
            self::Vote => 'Vote',
        };
    }
}
