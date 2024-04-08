<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coach_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('game_id')->constrained();
     
            $table->boolean('day_off')->default(false);
            $table->boolean('player_dev')->default(false);
            $table->boolean('team_meeting')->default(false);
            $table->boolean('scouting_report')->default(false);
            $table->integer('trainning')->nullable();
            $table->boolean('tactics_wings')->default(false);
            $table->boolean('tactics_center')->default(false);
            $table->boolean('defense_line')->default(false);
            $table->boolean('waste_time')->default(false);
            $table->boolean('man_marking')->default(false);
            $table->boolean('zone_marking')->default(false);
            $table->boolean('aggressive')->default(false);
            $table->boolean('smooth')->default(false);
            $table->enum('balance', ['all_attack', 'balance_attack', 'defending', 'all_defend'])->default('balance_attack');
            $table->enum('tactic', ['4-4-2', '4-3-3', '4-2-3-1', '3-4-3', '3-5-2', '5-3-2', '5-4-1', '4-5-1', '4-1-4-1'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_settings');
    }
};
