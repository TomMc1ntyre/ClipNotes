<?php

use App\Http\Controllers\ClipNotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [ClipNotesController::class, 'index'])->name('home');
    Route::get('/notes/create', [ClipNotesController::class, 'create'])->name('notes.create');
    Route::post('/notes', [ClipNotesController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}', [ClipNotesController::class, 'show'])->name('notes.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

