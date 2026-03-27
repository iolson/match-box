<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('round_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained()->cascadeOnDelete();
            $table->foreignId('match_map_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('round_number');
            $table->string('event_type');
            $table->json('event_data')->nullable();
            $table->timestamp('event_time')->nullable();
            $table->foreignId('kill_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('round_events');
    }
};
