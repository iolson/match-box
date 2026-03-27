<?php

namespace Database\Seeders;

use App\Models\MatchConfig;
use Illuminate\Database\Seeder;

class MatchConfigSeeder extends Seeder
{
    public function run(): void
    {
        $configs = [
            [
                'name' => 'Standard BO1',
                'best_of' => 1,
                'max_rounds' => 12,
                'overtime_start_money' => 12500,
                'overtime_max_rounds' => 3,
                'overtime_enabled' => true,
                'knife_round_enabled' => true,
                'streamer_mode' => false,
                'heatmap_enabled' => false,
                'is_default' => true,
            ],
            [
                'name' => 'Standard BO3',
                'best_of' => 3,
                'max_rounds' => 12,
                'overtime_start_money' => 12500,
                'overtime_max_rounds' => 3,
                'overtime_enabled' => true,
                'knife_round_enabled' => true,
                'streamer_mode' => false,
                'heatmap_enabled' => false,
                'is_default' => false,
            ],
            [
                'name' => 'Standard BO5',
                'best_of' => 5,
                'max_rounds' => 12,
                'overtime_start_money' => 12500,
                'overtime_max_rounds' => 3,
                'overtime_enabled' => true,
                'knife_round_enabled' => true,
                'streamer_mode' => false,
                'heatmap_enabled' => false,
                'is_default' => false,
            ],
        ];

        foreach ($configs as $config) {
            MatchConfig::firstOrCreate(['name' => $config['name']], $config);
        }
    }
}
