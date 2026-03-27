<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // Relations
            $table->foreignId('server_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('event_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('group_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bracket_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('team_a_id')->nullable()->constrained('event_teams')->nullOnDelete();
            $table->foreignId('team_b_id')->nullable()->constrained('event_teams')->nullOnDelete();

            // Team display overrides
            $table->string('team_a_name')->nullable();
            $table->string('team_b_name')->nullable();
            $table->string('team_a_country', 2)->nullable();
            $table->string('team_b_country', 2)->nullable();

            // Status
            $table->string('status')->default('not_started');
            $table->boolean('is_paused')->default(false);

            // Scores
            $table->unsignedTinyInteger('score_a')->default(0);
            $table->unsignedTinyInteger('score_b')->default(0);

            // Config
            $table->unsignedTinyInteger('best_of')->default(1);
            $table->unsignedTinyInteger('max_rounds')->default(12);
            $table->unsignedInteger('overtime_start_money')->default(12500);
            $table->unsignedTinyInteger('overtime_max_rounds')->default(3);
            $table->boolean('overtime_enabled')->default(true);
            $table->boolean('knife_round_enabled')->default(true);
            $table->boolean('auto_switch_sides')->default(true);
            $table->boolean('streamer_mode')->default(false);
            $table->boolean('heatmap_enabled')->default(false);
            $table->string('map_selection_mode')->default('manual');

            // Scheduling
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            // Bracket placement
            $table->unsignedInteger('bracket_round')->nullable();
            $table->unsignedInteger('bracket_position')->nullable();

            // Auth
            $table->string('auth_key')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
