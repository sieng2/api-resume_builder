<?php

use Illuminate\Support\Facades\Route;

#http://127.0.0.1:8000/
Route::get('/', function () {
    return view('welcome');
});

#http://127.0.0.1:8000/login
Route::get('/login', function () {
    return view('backend.login');
});

#http://127.0.0.1:8000/dashboard
Route::get('/dashboard', function () {
    return view('backend.dashboard');
});

#http://127.0.0.1:8000/users
Route::get('/users', function () {
    return view('backend.users');
});

#http://127.0.0.1:8000/resume
Route::get('/resume', function () {
    return view('backend.resume');
});

#http://127.0.0.1:8000/template
Route::get('/template', function () {
    return view('backend.template');
});




