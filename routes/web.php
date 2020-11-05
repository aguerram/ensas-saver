<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Enregistrement;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/enrg3', function () {
        return view('enrg3');
    })->name('enrg3');

    Route::post('/enrg3',[Enregistrement::class, "enrg3_submit"])->name('enrg3_submit');
    Route::post('/enrg4',[Enregistrement::class, "enrg4_submit"])->name('enrg3_submit');

    Route::get('/enrg4', function () {
        return view('enrg4');
    })->name('enrg4');

    Route::get('/notes/3', [NotesController::class, "index3a"])->name('note3');
    Route::get('/notes/4', [NotesController::class, "index4a"])->name('note4');

    Route::get('/excel/', [NotesController::class, "excel"])->name('note4');

    Route::post('/notes_update', [NotesController::class, "update"])->name('notes_update');
});


Route::get('register', function () {
    return redirect('login');
})->name('register');

Route::post('register', function () {
    return redirect('login');
});
