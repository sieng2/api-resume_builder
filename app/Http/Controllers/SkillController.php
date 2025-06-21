<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Skill::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'skill_name' => 'required|string|max:100',
            'level' => 'nullable|string|max:50',
        ]);

        $skill = Skill::create($data);
        return response()->json($skill, 201);
    }

    public function show($id)
    {
        return Skill::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $data = $request->validate([
            'skill_name' => 'sometimes|required|string|max:100',
            'level' => 'nullable|string|max:50',
        ]);

        $skill->update($data);
        return response()->json($skill);
    }

    public function destroy($id)
    {
        Skill::destroy($id);
        return response()->json(null, 204);
    }
}
