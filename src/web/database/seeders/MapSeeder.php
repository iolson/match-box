<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    public function run(): void
    {
        $maps = [
            ['name' => 'de_ancient', 'display_name' => 'Ancient', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'de_anubis', 'display_name' => 'Anubis', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'de_dust2', 'display_name' => 'Dust2', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'de_inferno', 'display_name' => 'Inferno', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'de_mirage', 'display_name' => 'Mirage', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'de_nuke', 'display_name' => 'Nuke', 'sort_order' => 6, 'is_active' => true],
            ['name' => 'de_overpass', 'display_name' => 'Overpass', 'sort_order' => 7, 'is_active' => true],
            ['name' => 'de_train', 'display_name' => 'Train', 'sort_order' => 8, 'is_active' => false],
            ['name' => 'de_vertigo', 'display_name' => 'Vertigo', 'sort_order' => 9, 'is_active' => false],
        ];

        foreach ($maps as $map) {
            Map::firstOrCreate(['name' => $map['name']], $map);
        }
    }
}
