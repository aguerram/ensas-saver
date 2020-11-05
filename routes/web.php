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
        return view('enrg');
    })->name('enrg3');

    Route::get('/enrg4', function () {
        return view('enrg');
    })->name('enrg4');

    Route::post('/enrg3',[Enregistrement::class, "enrg3_submit"])->name('enrg3_submit');
    Route::post('/enrg4',[Enregistrement::class, "enrg4_submit"])->name('enrg4_submit');

    Route::post('/mark-presence3',[Enregistrement::class, "mark_presence3"])->name('mark-presence3');
    Route::post('/mark-presence4',[Enregistrement::class, "mark_presence4"])->name('mark-presence4');
    Route::get('/mark-presence3',function () {
        return redirect('enrg3');
    });
    Route::get('/mark-presence4',function () {
        return redirect('enrg4');
    });


    Route::get('/notes/3', [NotesController::class, "index3a"])->name('note3');
    Route::get('/notes/4', [NotesController::class, "index4a"])->name('note4');

    Route::post('/notes_update', [NotesController::class, "update"])->name('notes_update');
});


Route::get('register', function () {
    return redirect('login');
})->name('register');

Route::post('register', function () {
    return redirect('login');
});
