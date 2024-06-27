<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowCountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/countries/{countryCode}', ShowCountryController::class)->name('countries.show');
