<?php

namespace App\Enums;

enum RoundEventType: string
{
    case Kill = 'kill';
    case BombPlant = 'bomb_plant';
    case BombDefuse = 'bomb_defuse';
    case BombExplode = 'bomb_explode';
    case RoundStart = 'round_start';
    case RoundEnd = 'round_end';
    case PlayerConnect = 'player_connect';
    case PlayerDisconnect = 'player_disconnect';
    case Timeout = 'timeout';

    public function label(): string
    {
        return match ($this) {
            self::Kill => 'Kill',
            self::BombPlant => 'Bomb Plant',
            self::BombDefuse => 'Bomb Defuse',
            self::BombExplode => 'Bomb Explode',
            self::RoundStart => 'Round Start',
            self::RoundEnd => 'Round End',
            self::PlayerConnect => 'Player Connect',
            self::PlayerDisconnect => 'Player Disconnect',
            self::Timeout => 'Timeout',
        };
    }
}
