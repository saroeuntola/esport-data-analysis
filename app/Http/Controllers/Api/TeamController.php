<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(Team::with('members')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|unique:teams',
            'logo' => 'nullable|string'
        ]);

        $team = Team::create($request->all());

        return response()->json(['message' => 'Team created', 'data' => $team]);
    }
}
