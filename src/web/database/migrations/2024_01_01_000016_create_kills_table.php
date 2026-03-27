<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('round_number');

            // Killer
            $table->string('killer_steam_id');
            $table->string('killer_name');
            $table->string('killer_team')->nullable();
            $table->string('killer_side', 2)->nullable();

            // Victim
            $table->string('victim_steam_id');
            $table->string('victim_name');
            $table->string('victim_team')->nullable();
            $table->string('victim_side', 2)->nullable();

            // Details
            $table->string('weapon')->nullable();
            $table->boolean('is_headshot')->default(false);
            $table->boolean('is_wallbang')->default(false);
            $table->boolean('is_noscope')->default(false);
            $table->boolean('is_through_smoke')->default(false);
            $table->boolean('is_blind_kill')->default(false);
            $table->boolean('is_entry_kill')->default(false);

            $table->timestamp('event_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kills');
    }
};
