<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/notes/download-csv', [NoteController::class, 'downloadCSV'])->name('notes.download-csv');
Route::resource('notes', NoteController::class);



require __DIR__ . '/auth.php';
