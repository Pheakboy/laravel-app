<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use Illuminate\Http\Request;

// Public routes
Route::get('/', [ChirpController::class, 'index'])->name('home');
Route::get('chirps', [ChirpController::class, 'index'])->name('chirps.index');

Route::get('/product', function (Request $request) {
    return ['name' => 'Laravel Product', 'price' => 99.99, 'men', 'in_stock' => true];
});

Route::get('/about', function (Request $request) {
    return view('pages.about');
})->name('about');

Route::get('/contact', function (Request $request) {
    return view('pages.contact');
})->name('contact');

Route::get('/services', function (Request $request) {
    return view('pages.services');
})->name('services');


// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('my-chirps', [ChirpController::class, 'myChirps'])->name('chirps.my');
    Route::get('chirps/create', [ChirpController::class, 'create'])->name('chirps.create');
    Route::post('chirps', [ChirpController::class, 'store'])->name('chirps.store');
    Route::get('chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    Route::delete('chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');
});

// Public show route (must come after /chirps/create to avoid conflict)
Route::get('chirps/{chirp}', [ChirpController::class, 'show'])->name('chirps.show');

// Authentication routes (Laravel Breeze or custom auth)
require __DIR__.'/auth.php';




