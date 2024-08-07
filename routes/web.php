<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', [CalculationController::class, 'index']);

Route::post('/calcresult', [CalculationController::class, 'calculate']);