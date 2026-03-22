<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminExperienceController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminSettingController;
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
	Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
	Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
	Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])->name('logout');

	Route::prefix('admin')->name('admin.')->group(function () {
		Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
		Route::get('/content', [AdminContentController::class, 'index'])->name('content.index');
		Route::resource('projects', AdminProjectController::class)->except(['show']);
		Route::resource('posts', AdminPostController::class)->except(['show']);
		Route::resource('experiences', AdminExperienceController::class)->except(['show']);
		Route::get('/settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
		Route::match(['post', 'put'], '/settings', [AdminSettingController::class, 'update'])->name('settings.update');
	});
});
