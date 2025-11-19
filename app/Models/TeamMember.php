<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = ['player_name', 'team_id', 'role', 'avatar'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function playerStats()
    {
        return $this->hasMany(PlayerMatchStats::class, 'player_id');
    }
}
