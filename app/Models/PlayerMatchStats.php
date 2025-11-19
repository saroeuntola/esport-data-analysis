<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerMatchStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'player_id',
        'hero_id',
        'kills',
        'deaths',
        'assists',
        'kd_ratio',
        'winrate',
        'gold',
        'cs',
        'damage',
        'healing'
    ];

    public function match()
    {
        return $this->belongsTo(MatchesPick::class, 'match_id');
    }

    public function player()
    {
        return $this->belongsTo(TeamMember::class, 'player_id');
    }

    public function hero()
    {
        return $this->belongsTo(Hero::class, 'hero_id');
    }
}
