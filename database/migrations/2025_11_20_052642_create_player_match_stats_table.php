<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('player_match_stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('hero_id');

            $table->integer('kills')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('assists')->nullable();
            $table->decimal('kd_ratio', 5, 2)->nullable();
            $table->decimal('winrate', 5, 2)->nullable();
            $table->integer('gold')->nullable();
            $table->integer('cs')->nullable();
            $table->integer('damage')->nullable();
            $table->integer('healing')->nullable()->default(0);

            $table->timestamps();
        });

        Schema::table('player_match_stats', function (Blueprint $table) {
            $table->foreign('match_id')->references('id')->on('matches_pick')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('team_members')->onDelete('cascade');
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('player_match_stats');
    }
};
