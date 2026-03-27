<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heatmap_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('round_number');
            $table->string('event_type');

            // Player position
            $table->float('x');
            $table->float('y');
            $table->float('z');
            $table->string('player_steam_id');
            $table->string('player_name');
            $table->string('player_team')->nullable();

            // Attacker position (nullable)
            $table->float('attacker_x')->nullable();
            $table->float('attacker_y')->nullable();
            $table->float('attacker_z')->nullable();
            $table->string('attacker_steam_id')->nullable();
            $table->string('attacker_name')->nullable();
            $table->string('attacker_team')->nullable();

            $table->float('round_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heatmap_points');
    }
};
