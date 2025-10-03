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
        Schema::create('esport_data', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('matches')->nullable();
            $table->string('red_blue')->nullable();
            $table->string('win_lose')->nullable();
            $table->string('team')->nullable();
            $table->string('opponent')->nullable();
            $table->string('total_kills')->nullable();
            $table->string('time')->nullable();
            $table->string('hero')->nullable();
            $table->string('name')->nullable();
            $table->string('shooter')->nullable();
            $table->string('kill')->nullable();
            $table->string('death')->nullable();
            $table->string('assis')->nullable();
            $table->string('kd')->nullable();
            $table->string('teamfight_participation_rate')->nullable();
            $table->string('damage_dealt')->nullable();
            $table->string('damage_taken')->nullable();
            $table->string('economy')->nullable();
            $table->string('damage_even_distribution')->nullable();
            $table->string('damage_dealt_even_distribution2')->nullable();
            $table->string('economy_even_distribution')->nullable();
            $table->string('gold_to_damage_ratio')->nullable();
            $table->string('gold_to_damage_taken_ratio')->nullable();
            $table->string('10_minute_gold_individual')->nullable();
            $table->string('10_minute_gold_difference_team')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esport_data');
    }
};
