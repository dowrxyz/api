<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return Profile::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
        ]);

        $profile = Profile::create($validated);

        return response()->json($profile, 201);
    }

    public function show(Profile $profile)
    {
        return $profile;
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'edad' => 'sometimes|integer',
        ]);

        $profile->update($validated);

        return response()->json($profile, 200);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json(null, 204);
    }
}
