<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BirdController;



Route::get('/', [DashboardController::class, 'index'])
    // ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


$pages = [
    'about' => AboutController::class,
    'gallery' => GalleryController::class,
    'contact' => ContactController::class,
    'testimonial' => TestimonialController::class,
];

Route::prefix('pages')->group(function () use ($pages) {
    foreach ($pages as $uri => $controller) {
        Route::get("/{$uri}", [$controller, 'index'])->name($uri);
        if ($uri === 'about') {
            Route::post("/{$uri}", [$controller, 'store'])->name("{$uri}.store");
        }
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});


Route::get('/bird/{id}/edit', [BirdController::class, 'edit'])->name('bird.edit');
Route::put('/bird/{id}', [BirdController::class, 'update'])->name('bird.update');
Route::delete('/bird/{id}', [BirdController::class, 'destroy'])->name('bird.destroy');

require __DIR__ . '/auth.php';
