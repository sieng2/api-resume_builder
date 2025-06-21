<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Experience::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'company_name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::create($data);
        return response()->json($experience, 201);
    }

    public function show($id)
    {
        return Experience::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $data = $request->validate([
            'company_name' => 'sometimes|required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $experience->update($data);
        return response()->json($experience);
    }

    public function destroy($id)    
    {
        Experience::destroy($id);
        return response()->json(null, 204);
    }
}
