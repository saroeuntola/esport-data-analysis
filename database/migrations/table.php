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

        //table teams
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->unique();
            $table->string('logo')->nullable();
            $table->timestamps();
        });



        //table hero for store all hero
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();

            $table->string('hero_name')->unique();
            $table->string('hero_image')->nullable();
            $table->string('role')->nullable();

            $table->timestamps();
        });


        //table team_menber
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();

            $table->string('player_name');

            $table->unsignedBigInteger('team_id'); // FK to teams
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->enum('role', ['jungler', 'mid', 'marksman', 'support'])->nullable();

            $table->string('avatar')->nullable(); // player image
            $table->timestamps();
        });



        //matches_pick up 

        Schema::create('matches_pick', function (Blueprint $table) {
            $table->id();

            $table->date('match_date')->nullable();

            // ----------------- TEAM A -----------------
            $table->unsignedBigInteger('team_a_id')->nullable();
            $table->foreign('team_a_id')->references('id')->on('teams')->onDelete('set null');

            $table->enum('team_a_side', ['blue', 'red'])->nullable();

            // Bans
            $table->unsignedBigInteger('team_a_ban1')->nullable();
            $table->unsignedBigInteger('team_a_ban2')->nullable();
            $table->unsignedBigInteger('team_a_ban3')->nullable();
            $table->unsignedBigInteger('team_a_ban4')->nullable();

            $table->foreign('team_a_ban1')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_ban2')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_ban3')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_ban4')->references('id')->on('heroes')->onDelete('set null');

            // Player picks
            $table->unsignedBigInteger('team_a_jungler_hero')->nullable();
            $table->unsignedBigInteger('team_a_jungler_player')->nullable();
            $table->unsignedBigInteger('team_a_mid_hero')->nullable();
            $table->unsignedBigInteger('team_a_mid_player')->nullable();
            $table->unsignedBigInteger('team_a_marksman_hero')->nullable();
            $table->unsignedBigInteger('team_a_marksman_player')->nullable();
            $table->unsignedBigInteger('team_a_support_hero')->nullable();
            $table->unsignedBigInteger('team_a_support_player')->nullable();

            $table->foreign('team_a_jungler_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_jungler_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_a_mid_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_mid_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_a_marksman_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_marksman_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_a_support_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_a_support_player')->references('id')->on('team_members')->onDelete('set null');

            $table->enum('team_a_result', ['win', 'lose'])->nullable();

            // ----------------- TEAM B -----------------
            $table->unsignedBigInteger('team_b_id')->nullable();
            $table->foreign('team_b_id')->references('id')->on('teams')->onDelete('set null');

            $table->enum('team_b_side', ['blue', 'red'])->nullable();

            // Bans
            $table->unsignedBigInteger('team_b_ban1')->nullable();
            $table->unsignedBigInteger('team_b_ban2')->nullable();
            $table->unsignedBigInteger('team_b_ban3')->nullable();
            $table->unsignedBigInteger('team_b_ban4')->nullable();

            $table->foreign('team_b_ban1')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_ban2')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_ban3')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_ban4')->references('id')->on('heroes')->onDelete('set null');

            // Player picks
            $table->unsignedBigInteger('team_b_jungler_hero')->nullable();
            $table->unsignedBigInteger('team_b_jungler_player')->nullable();
            $table->unsignedBigInteger('team_b_mid_hero')->nullable();
            $table->unsignedBigInteger('team_b_mid_player')->nullable();
            $table->unsignedBigInteger('team_b_marksman_hero')->nullable();
            $table->unsignedBigInteger('team_b_marksman_player')->nullable();
            $table->unsignedBigInteger('team_b_support_hero')->nullable();
            $table->unsignedBigInteger('team_b_support_player')->nullable();

            $table->foreign('team_b_jungler_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_jungler_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_b_mid_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_mid_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_b_marksman_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_marksman_player')->references('id')->on('team_members')->onDelete('set null');
            $table->foreign('team_b_support_hero')->references('id')->on('heroes')->onDelete('set null');
            $table->foreign('team_b_support_player')->references('id')->on('team_members')->onDelete('set null');

            $table->enum('team_b_result', ['win', 'lose'])->nullable();

            $table->timestamps();
        });



        //team stats
        Schema::create('team_match_stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->references('id')->on('matches_pick')->onDelete('cascade');

            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            // Stats
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


        //Player Match Stats
        Schema::create('player_match_stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->references('id')->on('matches_pick')->onDelete('cascade');

            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('team_members')->onDelete('cascade');

            $table->unsignedBigInteger('hero_id');
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('set null');

            // Player Stats
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
    }
};
