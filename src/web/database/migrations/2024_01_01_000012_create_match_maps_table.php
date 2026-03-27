<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('match_maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->string('map_name');
            $table->unsignedTinyInteger('map_order')->default(1);
            $table->unsignedTinyInteger('score_team_a')->default(0);
            $table->unsignedTinyInteger('score_team_b')->default(0);
            $table->string('status')->default('pending');
            $table->string('current_side')->nullable();
            $table->unsignedTinyInteger('overtime_count')->default(0);
            $table->string('demo_file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_maps');
    }
};
