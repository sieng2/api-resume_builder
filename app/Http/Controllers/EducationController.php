<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return response()->json(['data' => $educations]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'school_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'field' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $education = Education::create($data);
        return response()->json($education, 201);
    }

    public function show($id)
    {
        return Education::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);

        $data = $request->validate([
            'school_name' => 'sometimes|required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'field' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $education->update($data);
        return response()->json($education);
    }

    public function destroy($id)
    {
        Education::destroy($id);
        return response()->json(null, 204);
    }
}
