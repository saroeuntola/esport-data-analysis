<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'logo'];

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function matchesAsTeamA()
    {
        return $this->hasMany(MatchesPick::class, 'team_a_id');
    }

    public function matchesAsTeamB()
    {
        return $this->hasMany(MatchesPick::class, 'team_b_id');
    }

    public function matchStats()
    {
        return $this->hasMany(TeamMatchStats::class);
    }
}
