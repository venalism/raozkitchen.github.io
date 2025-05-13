<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuKateringController;

// Landing Page
Route::get('/', function () {
    return view('client.landing');
})->name('landing');

// Menu Page
Route::get('/menu', function () {
    return view('client.menu');
})->name('menu');

// About Page
Route::get('/about', function () {
    return view('client.about');
})->name('about');

Route::get('/menu', [MenuKateringController::class, 'index'])->name('menu');