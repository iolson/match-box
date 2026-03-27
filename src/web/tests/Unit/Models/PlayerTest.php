<?php

use App\Models\MatchPlayer;
use App\Models\Player;
use App\Models\Roster;
use Illuminate\Database\Eloquent\Relations\HasMany;

it('has fillable attributes', function () {
    $player = new Player();
    expect($player->getFillable())->toContain('steam_id', 'name', 'avatar_path', 'country_code');
});

it('casts attributes correctly', function () {
    $player = new Player();
    expect($player->getCasts())->toBeArray();
});

it('has rosters relationship', function () {
    $player = new Player();
    expect($player->rosters())->toBeInstanceOf(HasMany::class);
});

it('has matchPlayers relationship', function () {
    $player = new Player();
    expect($player->matchPlayers())->toBeInstanceOf(HasMany::class);
});
