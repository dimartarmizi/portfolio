<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [LandingController::class, 'index'])->name('index');

// Blogs (static/demo for now)
Route::get('/blogs', [LandingController::class, 'blogsIndex'])->name('blogs.index');
Route::get('/blogs/{slug}', [LandingController::class, 'blogsShow'])->name('blogs.show');

// Experiences (static/demo for now)
Route::get('/experiences', [LandingController::class, 'experiencesIndex'])->name('experiences.index');
Route::get('/experiences/{id}', [LandingController::class, 'experiencesShow'])->name('experiences.show');

// Projects (static/demo for now)
Route::get('/projects', [LandingController::class, 'projectsIndex'])->name('projects.index');
Route::get('/projects/{id}', [LandingController::class, 'projectsShow'])->name('projects.show');