<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index()
    {
        return response()->json(Hero::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_name' => 'required|string|unique:heroes',
            'hero_image' => 'nullable|string',
            'role' => 'nullable|string'
        ]);

        $hero = Hero::create($request->all());

        return response()->json(['message' => 'Hero created', 'data' => $hero]);
    }
}
