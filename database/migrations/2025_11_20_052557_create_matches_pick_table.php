<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matches_pick', function (Blueprint $table) {
            $table->id();
            $table->date('match_date')->nullable();

            // TEAM A
            $table->unsignedBigInteger('team_a_id')->nullable();
            $table->enum('team_a_side', ['blue', 'red'])->nullable();

            // TEAM B
            $table->unsignedBigInteger('team_b_id')->nullable();
            $table->enum('team_b_side', ['blue', 'red'])->nullable();

            // BANS — TEAM A
            $table->unsignedBigInteger('team_a_ban1')->nullable();
            $table->unsignedBigInteger('team_a_ban2')->nullable();
            $table->unsignedBigInteger('team_a_ban3')->nullable();
            $table->unsignedBigInteger('team_a_ban4')->nullable();

            // BANS — TEAM B
            $table->unsignedBigInteger('team_b_ban1')->nullable();
            $table->unsignedBigInteger('team_b_ban2')->nullable();
            $table->unsignedBigInteger('team_b_ban3')->nullable();
            $table->unsignedBigInteger('team_b_ban4')->nullable();

            // Player picks TEAM A
            $table->unsignedBigInteger('team_a_jungler_hero')->nullable();
            $table->unsignedBigInteger('team_a_jungler_player')->nullable();
            $table->unsignedBigInteger('team_a_mid_hero')->nullable();
            $table->unsignedBigInteger('team_a_mid_player')->nullable();
            $table->unsignedBigInteger('team_a_marksman_hero')->nullable();
            $table->unsignedBigInteger('team_a_marksman_player')->nullable();
            $table->unsignedBigInteger('team_a_support_hero')->nullable();
            $table->unsignedBigInteger('team_a_support_player')->nullable();

            // Player picks TEAM B
            $table->unsignedBigInteger('team_b_jungler_hero')->nullable();
            $table->unsignedBigInteger('team_b_jungler_player')->nullable();
            $table->unsignedBigInteger('team_b_mid_hero')->nullable();
            $table->unsignedBigInteger('team_b_mid_player')->nullable();
            $table->unsignedBigInteger('team_b_marksman_hero')->nullable();
            $table->unsignedBigInteger('team_b_marksman_player')->nullable();
            $table->unsignedBigInteger('team_b_support_hero')->nullable();
            $table->unsignedBigInteger('team_b_support_player')->nullable();

            $table->enum('team_a_result', ['win', 'lose'])->nullable();
            $table->enum('team_b_result', ['win', 'lose'])->nullable();

            $table->timestamps();
        });

        // Apply FKs in separate step
        Schema::table('matches_pick', function (Blueprint $table) {
            // Teams
            $table->foreign('team_a_id')->references('id')->on('teams')->onDelete('set null');
            $table->foreign('team_b_id')->references('id')->on('teams')->onDelete('set null');

            // Hero bans
            foreach (['team_a_ban1', 'team_a_ban2', 'team_a_ban3', 'team_a_ban4', 'team_b_ban1', 'team_b_ban2', 'team_b_ban3', 'team_b_ban4'] as $ban) {
                $table->foreign($ban)->references('id')->on('heroes')->onDelete('set null');
            }

            // Player–Hero picks
            foreach (
                [
                    'team_a_jungler_hero',
                    'team_a_mid_hero',
                    'team_a_marksman_hero',
                    'team_a_support_hero',
                    'team_b_jungler_hero',
                    'team_b_mid_hero',
                    'team_b_marksman_hero',
                    'team_b_support_hero'
                ] as $heroFK
            ) {
                $table->foreign($heroFK)->references('id')->on('heroes')->onDelete('set null');
            }

            foreach (
                [
                    'team_a_jungler_player',
                    'team_a_mid_player',
                    'team_a_marksman_player',
                    'team_a_support_player',
                    'team_b_jungler_player',
                    'team_b_mid_player',
                    'team_b_marksman_player',
                    'team_b_support_player'
                ] as $playerFK
            ) {
                $table->foreign($playerFK)->references('id')->on('team_members')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches_pick');
    }
};
