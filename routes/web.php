<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('index');

Route::get('/blogs', [LandingController::class, 'blogsIndex'])->name('blogs.index');
Route::get('/blogs/{slug}', [LandingController::class, 'blogsShow'])->name('blogs.show');

Route::get('/experiences', [LandingController::class, 'experiencesIndex'])->name('experiences.index');
Route::get('/experiences/{id}', [LandingController::class, 'experiencesShow'])->name('experiences.show');

Route::get('/projects', [LandingController::class, 'projectsIndex'])->name('projects.index');
Route::get('/projects/{slug}', [LandingController::class, 'projectsShow'])->name('projects.show');

Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))->name('dashboard');

Route::middleware('guest')->group(function () {
	Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
	Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
	Route::post('/admin/logout', [AuthController::class, 'destroy'])->name('logout');

	Route::prefix('admin')->name('admin.')->group(function () {
		Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/content', [ContentController::class, 'index'])->name('content.index');
		Route::resource('projects', ProjectController::class)->except(['show']);
		Route::resource('posts', PostController::class)->except(['show']);
		Route::resource('experiences', ExperienceController::class)->except(['show']);
		Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
		Route::match(['post', 'put'], '/settings', [SettingController::class, 'update'])->name('settings.update');
	});
});
