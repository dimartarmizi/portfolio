<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

// Blogs (static/demo for now)
Route::get('/blogs', function () { return view('blogs.index'); })->name('blogs.index');
Route::get('/blogs/{slug}', function ($slug) { return view('blogs.show'); })->name('blogs.show');

// Experiences (static/demo for now)
Route::get('/experiences', function () { return view('experiences.index'); })->name('experiences.index');
Route::get('/experiences/{id}', function ($id) { return view('experiences.show'); })->name('experiences.show');

// Projects (static/demo for now)
Route::get('/projects', function () { return view('projects.index'); })->name('projects.index');
Route::get('/projects/{id}', function ($id) { return view('projects.show'); })->name('projects.show');