<?php

use App\Models\Map;
use App\Models\MatchConfig;

it('seeds match configs', function () {
    $this->seed(\Database\Seeders\MatchConfigSeeder::class);

    expect(MatchConfig::count())->toBe(3);
    expect(MatchConfig::where('name', 'Standard BO1')->exists())->toBeTrue();
    expect(MatchConfig::where('name', 'Standard BO3')->exists())->toBeTrue();
    expect(MatchConfig::where('name', 'Standard BO5')->exists())->toBeTrue();
});

it('seeds match configs with correct best_of values', function () {
    $this->seed(\Database\Seeders\MatchConfigSeeder::class);

    $bo1 = MatchConfig::where('name', 'Standard BO1')->first();
    $bo3 = MatchConfig::where('name', 'Standard BO3')->first();
    $bo5 = MatchConfig::where('name', 'Standard BO5')->first();

    expect($bo1->best_of)->toBe(1);
    expect($bo3->best_of)->toBe(3);
    expect($bo5->best_of)->toBe(5);
});

it('seeds match configs marking BO1 as default', function () {
    $this->seed(\Database\Seeders\MatchConfigSeeder::class);

    expect(MatchConfig::where('name', 'Standard BO1')->value('is_default'))->toBeTrue();
    expect(MatchConfig::where('name', 'Standard BO3')->value('is_default'))->toBeFalse();
    expect(MatchConfig::where('name', 'Standard BO5')->value('is_default'))->toBeFalse();
});

it('seeds maps', function () {
    $this->seed(\Database\Seeders\MapSeeder::class);

    expect(Map::count())->toBe(7);
    expect(Map::where('name', 'de_mirage')->exists())->toBeTrue();
});

it('seeds maps with expected names', function () {
    $this->seed(\Database\Seeders\MapSeeder::class);

    $expectedMaps = [
        'de_mirage', 'de_inferno', 'de_nuke',
        'de_ancient', 'de_anubis', 'de_dust2', 'de_vertigo',
    ];

    foreach ($expectedMaps as $mapName) {
        expect(Map::where('name', $mapName)->exists())->toBeTrue("Map {$mapName} should be seeded");
    }
});

it('seeds maps as active', function () {
    $this->seed(\Database\Seeders\MapSeeder::class);

    expect(Map::where('is_active', false)->count())->toBe(0);
});

it('is idempotent for match configs', function () {
    $this->seed(\Database\Seeders\MatchConfigSeeder::class);
    $this->seed(\Database\Seeders\MatchConfigSeeder::class);

    expect(MatchConfig::count())->toBe(3);
});

it('is idempotent for maps', function () {
    $this->seed(\Database\Seeders\MapSeeder::class);
    $this->seed(\Database\Seeders\MapSeeder::class);

    expect(Map::count())->toBe(7);
});
