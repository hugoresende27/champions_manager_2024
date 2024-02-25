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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('shortname')->nullable();
            $table->text('address')->nullable();
            $table->text('website')->nullable();
            $table->text('colors')->nullable();
            $table->text('code');
            $table->integer('funding_year');
            $table->foreignId('country_id')->constrained();
            $table->integer('rating')->nullable();
            $table->integer('stadium_id')->nullable();
            $table->text('flag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
