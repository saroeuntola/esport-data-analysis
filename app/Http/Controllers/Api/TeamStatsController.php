<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMatchStats;

class TeamStatsController extends Controller
{
    public function index()
    {
        return TeamMatchStats::with(['match.teamA', 'match.teamB', 'team'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:matches_pick,id',
            'team_id' => 'required|exists:teams,id'
        ]);

        $stats = TeamMatchStats::create($request->all());

        return response()->json(['message' => 'Team stats added', 'data' => $stats]);
    }
}
