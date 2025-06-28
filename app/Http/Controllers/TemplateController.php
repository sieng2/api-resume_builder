<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template; 


class TemplateController extends Controller
{
    // List all users
    public function index()
    {
        $template = Template::all();
        return response()->json($template);
    }
}
