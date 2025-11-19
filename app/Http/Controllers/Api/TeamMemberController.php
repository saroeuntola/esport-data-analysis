<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    public function index()
    {
        return response()->json(TeamMember::with('team')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string',
            'team_id' => 'required|exists:teams,id',
            'role' => 'nullable|in:jungler,mid,marksman,support',
            'avatar' => 'nullable|string'
        ]);

        $member = TeamMember::create($request->all());

        return response()->json(['message' => 'Member created', 'data' => $member]);
    }
}
