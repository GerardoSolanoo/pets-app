<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\OfferingController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TrashedController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('pets', PetController::class);
Route::resource('offerings', OfferingController::class);
Route::resource('appointments', AppointmentController::class);

Route::get('/trashed', [TrashedController::class, 'index'])->name('trashed.index');
Route::patch('/pets/{id}/restore', [PetController::class, 'restore'])->name('pets.restore');
Route::patch('/offerings/{id}/restore', [OfferingController::class, 'restore'])->name('offerings.restore');
Route::patch('/appointments/{id}/restore', [AppointmentController::class, 'restore'])->name('appointments.restore');