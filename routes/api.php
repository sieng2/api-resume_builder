<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactInfoController;

Route::apiResource('educations', EducationController::class);
Route::apiResource('experiences', ExperienceController::class);
Route::apiResource('skills', SkillController::class);
Route::apiResource('contactinfos', ContactInfoController::class);
