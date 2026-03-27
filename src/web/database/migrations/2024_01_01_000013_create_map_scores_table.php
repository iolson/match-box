<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('map_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->string('half');
            $table->unsignedTinyInteger('team_a_score')->default(0);
            $table->unsignedTinyInteger('team_b_score')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('map_scores');
    }
};
