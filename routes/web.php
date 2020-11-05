<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/enrg3', function () {
        return view('dashboard');
    })->name('enrg3');

    Route::get('/enrg4', function () {
        return view('dashboard');
    })->name('enrg4');

    Route::get('/note3', function () {
        return view('dashboard');
    })->name('note3');

    Route::get('/note4', function () {
        return view('dashboard');
    })->name('note4');
});


Route::get('register', function () {
    return redirect('login');
})->name('register');

Route::post('register', function () {
    return redirect('login');
});
