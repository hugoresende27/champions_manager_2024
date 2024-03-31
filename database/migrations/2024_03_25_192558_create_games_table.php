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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id')->foreign('about')->references('id')->on('teams')->onDelete('set null');

            $table->integer('season_win')->default(0);
            $table->integer('season_draw')->default(0);
            $table->integer('season_lost')->default(0);
            $table->integer('season_points')->default(0);
            $table->integer('season_games_played')->default(0);

            $table->integer('total_win')->default(0);
            $table->integer('total_draw')->default(0);
            $table->integer('total_lost')->default(0);
            $table->integer('total_points')->default(0);
            $table->integer('total_games_played')->default(0);
            $table->integer('total_time_played')->default(0);
            
            $table->date('current_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
