<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
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
