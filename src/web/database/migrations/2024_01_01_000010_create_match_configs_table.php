<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('best_of')->default(1);
            $table->unsignedTinyInteger('max_rounds')->default(12);
            $table->unsignedInteger('overtime_start_money')->default(12500);
            $table->unsignedTinyInteger('overtime_max_rounds')->default(3);
            $table->boolean('overtime_enabled')->default(true);
            $table->boolean('knife_round_enabled')->default(true);
            $table->boolean('streamer_mode')->default(false);
            $table->boolean('heatmap_enabled')->default(false);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_configs');
    }
};
