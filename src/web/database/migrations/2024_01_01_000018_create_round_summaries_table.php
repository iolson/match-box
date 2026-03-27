<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('round_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('round_number');

            $table->string('win_type')->nullable();
            $table->string('winning_team')->nullable();
            $table->string('winning_side', 2)->nullable();

            $table->boolean('bomb_planted')->default(false);
            $table->boolean('bomb_defused')->default(false);
            $table->boolean('bomb_exploded')->default(false);

            $table->unsignedTinyInteger('score_a')->default(0);
            $table->unsignedTinyInteger('score_b')->default(0);

            $table->string('backup_file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('round_summaries');
    }
};
