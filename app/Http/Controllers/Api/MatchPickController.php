<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchesPick;

class MatchPickController extends Controller
{
    public function index()
    {
        return MatchesPick::with([
            'teamA.members',
            'teamB.members',
            'playerStats.hero',
            'playerStats.player'
        ])->orderBy('match_date', 'desc')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_date' => 'required|date',
            'team_a_id' => 'required|exists:teams,id',
            'team_b_id' => 'required|exists:teams,id',
        ]);

        $match = MatchesPick::create($request->all());

        return response()->json([
            'message' => 'Match created',
            'data' => $match
        ]);
    }
}
