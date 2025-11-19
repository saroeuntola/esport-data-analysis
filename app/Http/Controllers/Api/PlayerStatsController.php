<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlayerMatchStats;

class PlayerStatsController extends Controller
{
    public function index()
    {
        return PlayerMatchStats::with(['match.teamA', 'match.teamB', 'player.team', 'hero'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:matches_pick,id',
            'player_id' => 'required|exists:team_members,id',
            'hero_id' => 'required|exists:heroes,id',
        ]);

        $stats = PlayerMatchStats::create($request->all());

        return response()->json(['message' => 'Player stats added', 'data' => $stats]);
    }

    // Player history grouped by hero
    public function heroStats($player_id)
    {
        $stats = PlayerMatchStats::with('hero')
            ->where('player_id', $player_id)
            ->get()
            ->groupBy('hero.hero_name');

        return response()->json($stats);
    }
}
