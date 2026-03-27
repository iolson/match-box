<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->nullable()->constrained()->nullOnDelete();
            $table->string('steam_id');
            $table->string('name');
            $table->string('team_side', 1);

            // Core stats
            $table->unsignedInteger('kills')->default(0);
            $table->unsignedInteger('assists')->default(0);
            $table->unsignedInteger('deaths')->default(0);
            $table->unsignedInteger('headshots')->default(0);
            $table->unsignedInteger('team_kills')->default(0);
            $table->unsignedInteger('bomb_plants')->default(0);
            $table->unsignedInteger('bomb_defuses')->default(0);

            // Multi-kill rounds
            $table->unsignedInteger('rounds_with_1k')->default(0);
            $table->unsignedInteger('rounds_with_2k')->default(0);
            $table->unsignedInteger('rounds_with_3k')->default(0);
            $table->unsignedInteger('rounds_with_4k')->default(0);
            $table->unsignedInteger('rounds_with_5k')->default(0);

            // Clutch wins
            $table->unsignedInteger('clutch_1v1')->default(0);
            $table->unsignedInteger('clutch_1v2')->default(0);
            $table->unsignedInteger('clutch_1v3')->default(0);
            $table->unsignedInteger('clutch_1v4')->default(0);
            $table->unsignedInteger('clutch_1v5')->default(0);

            // Entry
            $table->unsignedInteger('first_kills')->default(0);
            $table->unsignedInteger('first_deaths')->default(0);

            // Rating (HLTV-style * 100)
            $table->unsignedInteger('rating')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_players');
    }
};
