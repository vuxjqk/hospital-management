<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::resource('appointments', AppointmentController::class);
Route::resource('rooms', RoomController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
Route::get('/', function () {
    return view('welcome');
});
