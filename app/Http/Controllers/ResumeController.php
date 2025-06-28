<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{

    public function index()
    {
        $resumes = Resume::with([
            'user:user_id,name,email',
            'contactInfo',
            'education',
            'experience',
            'skills'
        ])->get();
        return response()->json($resumes);
    }
    public function show(Resume $resume)
    {
        $resume->load([
        'user:user_id,name,email',
            'contactInfo',
            'education',
            'experience',
            'skills'
        ]);

    return response()->json($resume);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'template_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
            'image_url' => 'required|string',
            'code' => 'required|string',
            'share_url' => 'required|string',
            'contact_info' => 'required|array',
            'education' => 'nullable|array',
            'experience' => 'nullable|array',
            'skills' => 'nullable|array'
        ]);

        DB::beginTransaction();

        try {
            // Create Resume
            $resume = Resume::create([
                'user_id' => $validated['user_id'],
                'template_id' => $validated['template_id'] ?? null,
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status' => $validated['status'] ?? null,
                'image_url' => $validated['image_url'],
                'code' => $validated['code'],
                'share_url' => $validated['share_url'],
            ]);

            // Create Contact Info
            ContactInfo::create([
                'resume_id' => $resume->resume_id,
                'full_name' => $validated['contact_info']['full_name'],
                'phone' => $validated['contact_info']['phone'] ?? null,
                'address' => $validated['contact_info']['address'] ?? null,
                'summary' => $validated['contact_info']['summary'] ?? null,
            ]);

            // Create Education Records
            if (!empty($validated['education'])) {
                foreach ($validated['education'] as $edu) {
                    Education::create([
                        'resume_id' => $resume->resume_id,
                        'school_name' => $edu['school_name'],
                        'degree' => $edu['degree'] ?? null,
                        'field' => $edu['field'] ?? null,
                        'start_date' => $edu['start_date'] ?? null,
                        'end_date' => $edu['end_date'] ?? null,
                        'description' => $edu['description'] ?? null,
                    ]);
                }
            }

            // Create Experience Records
            if (!empty($validated['experience'])) {
                foreach ($validated['experience'] as $exp) {
                    Experience::create([
                        'resume_id' => $resume->resume_id,
                        'company_name' => $exp['company_name'],
                        'job_title' => $exp['job_title'] ?? null,
                        'start_date' => $exp['start_date'] ?? null,
                        'end_date' => $exp['end_date'] ?? null,
                        'description' => $exp['description'] ?? null,
                    ]);
                }
            }

            // Create Skills
            if (!empty($validated['skills'])) {
                foreach ($validated['skills'] as $skill) {
                    Skill::create([
                        'resume_id' => $resume->resume_id,
                        'skill_name' => $skill['skill_name'],
                        'level' => $skill['level'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Resume created successfully', 'resume_id' => $resume->resume_id], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Failed to create resume', 'error' => $e->getMessage()], 500);
        }
    }


    public function update(Request $request, Resume $resume)
{
    $validated = $request->validate([
        'template_id' => 'nullable|integer',
        'name' => 'sometimes|string|max:255',
        'description' => 'nullable|string',
        'status' => 'nullable|boolean',
        'image_url' => 'sometimes|string',
        'code' => 'sometimes|string',
        'share_url' => 'sometimes|string',
        'contact_info' => 'nullable|array',
        'education' => 'nullable|array',
        'experience' => 'nullable|array',
        'skills' => 'nullable|array'
    ]);

    DB::beginTransaction();

    try {
        $resume->update($validated);

        // Update Contact Info
        if (isset($validated['contact_info'])) {
            $resume->contactInfo()->delete();
            ContactInfo::create([
                'resume_id' => $resume->resume_id,
                'full_name' => $validated['contact_info']['full_name'],
                'phone' => $validated['contact_info']['phone'] ?? null,
                'address' => $validated['contact_info']['address'] ?? null,
                'summary' => $validated['contact_info']['summary'] ?? null,
            ]);
        }

        // Update Education
        if (isset($validated['education'])) {
            $resume->education()->delete();
            foreach ($validated['education'] as $edu) {
                Education::create([
                    'resume_id' => $resume->resume_id,
                    'school_name' => $edu['school_name'],
                    'degree' => $edu['degree'] ?? null,
                    'field' => $edu['field'] ?? null,
                    'start_date' => $edu['start_date'] ?? null,
                    'end_date' => $edu['end_date'] ?? null,
                    'description' => $edu['description'] ?? null,
                ]);
            }
        }

        // Update Experience
        if (isset($validated['experience'])) {
            $resume->experience()->delete();
            foreach ($validated['experience'] as $exp) {
                Experience::create([
                    'resume_id' => $resume->resume_id,
                    'company_name' => $exp['company_name'],
                    'job_title' => $exp['job_title'] ?? null,
                    'start_date' => $exp['start_date'] ?? null,
                    'end_date' => $exp['end_date'] ?? null,
                    'description' => $exp['description'] ?? null,
                ]);
            }
        }

        // Update Skills
        if (isset($validated['skills'])) {
            $resume->skills()->delete();
            foreach ($validated['skills'] as $skill) {
                Skill::create([
                    'resume_id' => $resume->resume_id,
                    'skill_name' => $skill['skill_name'],
                    'level' => $skill['level'] ?? null,
                ]);
            }
        }

        DB::commit();

        return response()->json(['message' => 'Resume updated successfully']);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['message' => 'Failed to update resume', 'error' => $e->getMessage()], 500);
    }
}
public function destroy($id)
{
    DB::beginTransaction();

    try {
        $resume = Resume::findOrFail($id);

        // Delete related records
        $resume->contactInfo()->delete();
        $resume->education()->delete();
        $resume->experience()->delete();
        $resume->skills()->delete();

        // Delete the resume itself
        $resume->delete();

        DB::commit();
        return response()->json(['message' => 'Resume deleted successfully.'], 200);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'message' => 'Failed to delete resume.',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function toggleStatus($id)
{
    $resume = Resume::findOrFail($id);

    // Toggle logic: if 1 → 2, if 2 → 1, else set to 1 as default fallback
    $resume->status = $resume->status == 1 ? 2 : 1;
    $resume->save();

    return response()->json([
        'message' => 'Resume status updated successfully.',
        'resume_id' => $resume->resume_id,
        'new_status' => $resume->status
    ]);
}


    
}
