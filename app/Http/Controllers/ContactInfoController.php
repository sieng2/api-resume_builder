<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
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
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'summary' => 'nullable|string',
        ]);

        $contactInfo = ContactInfo::create($data);
        return response()->json($contactInfo, 201);
    }

    public function show($id)
    {
        return ContactInfo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $contactInfo = ContactInfo::findOrFail($id);

        $data = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'summary' => 'nullable|string',
        ]);

        $contactInfo->update($data);
        return response()->json($contactInfo);
    }

    public function destroy($id)
    {
        ContactInfo::destroy($id);
        return response()->json(null, 204);
    }
}
