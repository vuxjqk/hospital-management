<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::resource('patients', PatientController::class);
Route::get('/', function () {
    return view('welcome');
});
