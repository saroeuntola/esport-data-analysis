<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchesPick;

class MatchPickController extends Controller
{
    /**
     * Get all matches
     */
    public function index()
    {
        return MatchesPick::with([
            'teamA',
            'teamB',
            'teamA.members',
            'teamB.members',
            'playerStats',
            'playerStats.hero',
            'playerStats.player'
        ])->orderBy('match_date', 'desc')->get();
    }

    /**
     * Create match pick
     */
    public function store(Request $request)
    {
        $request->validate([
            'match_date' => 'required|date',
            'team_a_id' => 'required|exists:teams,id',
            'team_b_id' => 'required|exists:teams,id',
            'team_a_side' => 'nullable|in:blue,red',
            'team_b_side' => 'nullable|in:blue,red',
            'team_a_result' => 'nullable|in:win,lose',
            'team_b_result' => 'nullable|in:win,lose',

            // Bans
            'team_a_ban1' => 'nullable|exists:heroes,id',
            'team_a_ban2' => 'nullable|exists:heroes,id',
            'team_a_ban3' => 'nullable|exists:heroes,id',
            'team_a_ban4' => 'nullable|exists:heroes,id',

            'team_b_ban1' => 'nullable|exists:heroes,id',
            'team_b_ban2' => 'nullable|exists:heroes,id',
            'team_b_ban3' => 'nullable|exists:heroes,id',
            'team_b_ban4' => 'nullable|exists:heroes,id',

            // Player picks
            'team_a_jungler_hero' => 'nullable|exists:heroes,id',
            'team_a_jungler_player' => 'nullable|exists:team_members,id',
            'team_a_mid_hero' => 'nullable|exists:heroes,id',
            'team_a_mid_player' => 'nullable|exists:team_members,id',
            'team_a_marksman_hero' => 'nullable|exists:heroes,id',
            'team_a_marksman_player' => 'nullable|exists:team_members,id',
            'team_a_support_hero' => 'nullable|exists:heroes,id',
            'team_a_support_player' => 'nullable|exists:team_members,id',

            'team_b_jungler_hero' => 'nullable|exists:heroes,id',
            'team_b_jungler_player' => 'nullable|exists:team_members,id',
            'team_b_mid_hero' => 'nullable|exists:heroes,id',
            'team_b_mid_player' => 'nullable|exists:team_members,id',
            'team_b_marksman_hero' => 'nullable|exists:heroes,id',
            'team_b_marksman_player' => 'nullable|exists:team_members,id',
            'team_b_support_hero' => 'nullable|exists:heroes,id',
            'team_b_support_player' => 'nullable|exists:team_members,id',
        ]);

        // prevent Team A vs the same Team B
        if ($request->team_a_id == $request->team_b_id) {
            return response()->json([
                'error' => 'team_a_id and team_b_id cannot be the same'
            ], 422);
        }

        $match = MatchesPick::create($request->all());

        return response()->json([
            'message' => 'Match created successfully',
            'data' => MatchesPick::with([
                'teamA',
                'teamB',
                'teamA.members',
                'teamB.members',
                'playerStats',
                'playerStats.hero',
                'playerStats.player'
            ])->find($match->id)
        ], 201);
    }
}
