<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    public function run(): void
    {
        $maps = [
            ['name' => 'de_mirage', 'display_name' => 'Mirage', 'sort_order' => 1],
            ['name' => 'de_inferno', 'display_name' => 'Inferno', 'sort_order' => 2],
            ['name' => 'de_nuke', 'display_name' => 'Nuke', 'sort_order' => 3],
            ['name' => 'de_ancient', 'display_name' => 'Ancient', 'sort_order' => 4],
            ['name' => 'de_anubis', 'display_name' => 'Anubis', 'sort_order' => 5],
            ['name' => 'de_dust2', 'display_name' => 'Dust2', 'sort_order' => 6],
            ['name' => 'de_vertigo', 'display_name' => 'Vertigo', 'sort_order' => 7],
        ];

        foreach ($maps as $map) {
            Map::firstOrCreate(['name' => $map['name']], array_merge($map, ['is_active' => true]));
        }
    }
}
