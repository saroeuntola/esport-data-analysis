<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesPick extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_date',
        'team_a_id',
        'team_b_id',
        'team_a_side',
        'team_b_side',
        'team_a_result',
        'team_b_result',
        'team_a_ban1',
        'team_a_ban2',
        'team_a_ban3',
        'team_a_ban4',
        'team_b_ban1',
        'team_b_ban2',
        'team_b_ban3',
        'team_b_ban4',
        'team_a_jungler_hero',
        'team_a_jungler_player',
        'team_a_mid_hero',
        'team_a_mid_player',
        'team_a_marksman_hero',
        'team_a_marksman_player',
        'team_a_support_hero',
        'team_a_support_player',
        'team_b_jungler_hero',
        'team_b_jungler_player',
        'team_b_mid_hero',
        'team_b_mid_player',
        'team_b_marksman_hero',
        'team_b_marksman_player',
        'team_b_support_hero',
        'team_b_support_player'
    ];

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }

    public function teamStats()
    {
        return $this->hasMany(TeamMatchStats::class, 'match_id');
    }

    public function playerStats()
    {
        return $this->hasMany(PlayerMatchStats::class, 'match_id');
    }
}
