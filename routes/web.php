<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContactController;

Route::view('/', 'beranda')->name('beranda');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/tentang-kami', 'tentang')->name('tentang');

// detail page for a single portfolio (must be before the listing route)
Route::get('/portofolio/{slug}', [LandingController::class, 'showPortfolio'])->name('portfolio.show');

Route::get('/portofolio', [LandingController::class, 'portfolio'])->name('portfolio');
Route::view('/kontak', 'kontak')->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');
