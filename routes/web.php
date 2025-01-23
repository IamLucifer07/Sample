<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Route::get('/', function () {
//     return view('welcome');
// });

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


Route::prefix('pages')->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
});


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__ . '/auth.php';
