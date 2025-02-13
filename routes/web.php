<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('dashboard');
})
    // ->middleware(['auth', 'verified'])
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

        // Add a POST route specifically for the "about" page
        if ($uri === 'about') {
            Route::post("/{$uri}", [$controller, 'store'])->name("{$uri}.store");
        }
    }
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__ . '/auth.php';
