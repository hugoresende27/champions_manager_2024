<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->decimal('total_budget', 10, 2)->default(0.00);
            $table->decimal('transfers_budget', 10, 2)->default(0.00);
            $table->decimal('wages_budget', 10, 2)->default(0.00);
            $table->decimal('percentages_budget', 10, 2)->default(0.00);
        });
    }

    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['total_budget', 'transfers_budget', 'wages_budget']);
        });
    }
};
