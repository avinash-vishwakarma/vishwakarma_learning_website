<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->controller(ProfileController::class)->name('profile.')->group(function () {
    Route::get('/profile','show')->name('show');

});

require __DIR__.'/auth.php';
