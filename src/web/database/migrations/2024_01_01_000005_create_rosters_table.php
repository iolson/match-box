<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_captain')->default(false);
            $table->timestamps();

            $table->unique(['event_team_id', 'player_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rosters');
    }
};
