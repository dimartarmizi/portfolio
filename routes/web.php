<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;

Route::view('/', 'index')->name('index');
Route::get('/projects/{slug}', [LandingController::class, 'showProject'])->name('project.show');
Route::get('/projects', [LandingController::class, 'project'])->name('project');