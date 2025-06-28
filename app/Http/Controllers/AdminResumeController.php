<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resume;

class AdminResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::with('user')->get();

        return response()->json($resumes);
    }
}
