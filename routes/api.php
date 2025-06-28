<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminResumeController;
use App\Http\Controllers\TemplateController;


Route::apiResource('educations', EducationController::class);
Route::apiResource('experiences', ExperienceController::class);
Route::apiResource('skills', SkillController::class);
Route::apiResource('contactinfos', ContactInfoController::class);



Route::prefix('user/resumes')
    ->group(function () {
        Route::get('/', [ResumeController::class, 'index']); // List all resumes for the user
        Route::post('/', [ResumeController::class, 'store']);
        Route::get('/{resume}', [ResumeController::class, 'show']);    // Get single resume
        Route::put('/{resume}', [ResumeController::class, 'update']);
        Route::delete('/{resume}', [ResumeController::class, 'destroy']);
        Route::patch('/{id}/status', [ResumeController::class, 'toggleStatus']); // 1 for public, 2 for private

    });

Route::prefix('user/template')
    ->group(function () {
        Route::get('/', [TemplateController::class, 'index']); 
    });



Route::prefix('admin/all-user')
    ->group(function () {
        Route::get('/', [UserController::class, 'index']);           // List all users
        Route::get('/{user}', [UserController::class, 'show']);       // Get a single user
        Route::post('/', [UserController::class, 'store']);           // Create a new user
        Route::put('/{user}', [UserController::class, 'update']);     // Update existing user
        Route::delete('/{user}', [UserController::class, 'destroy']); // Delete user
        Route::patch('/{user}/ban', [UserController::class, 'ban']);   // Ban/unban use
    });


Route::prefix('admin/resumes')
    ->group(function () {
        Route::get('/', [AdminResumeController::class, 'index']); // List all resumes
    });