<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMatchStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'team_id',
        'kills',
        'deaths',
        'assists',
        'winrate',
        'total_gold',
        'towers_destroyed',
        'dragons_taken',
        'barons_taken'
    ];

    public function match()
    {
        return $this->belongsTo(MatchesPick::class, 'match_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
