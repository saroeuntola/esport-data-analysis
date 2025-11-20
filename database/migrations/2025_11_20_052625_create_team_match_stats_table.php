<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_match_stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');

            $table->integer('kills')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('assists')->nullable();
            $table->decimal('winrate', 5, 2)->nullable();
            $table->integer('total_gold')->nullable();
            $table->integer('towers_destroyed')->nullable();
            $table->integer('dragons_taken')->nullable();
            $table->integer('barons_taken')->nullable();

            $table->timestamps();
        });

        Schema::table('team_match_stats', function (Blueprint $table) {
            $table->foreign('match_id')->references('id')->on('matches_pick')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_match_stats');
    }
};
