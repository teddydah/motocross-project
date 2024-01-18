<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts/main');
});

// Main
Route::get('/', [ClubController::class, 'main'])->name('contact');

// Club
Route::resource('club', ClubController::class);

// Schedule
Route::resource('schedules', ScheduleController::class);

// Booking
Route::resource('bookings', BookingController::class);

//training
Route::get(
    '/training',
    [TrainingController::class, 'index']
)->name('training.index');

Route::get(
    '/create-training',
    [TrainingController::class, 'create']
)->name('training.create');

Route::post(
    '/create-training',
    [TrainingController::class, 'store']
)->name('training.store');

Route::get(
    '/edit-training/{id}',
    [TrainingController::class, 'edit']
)->name('training.edit');

Route::put(
    '/edit-training/{id}',
    [TrainingController::class, 'update']
)->name('training.update');

Route::delete(
    '/delete-training/{id}',
    [TrainingController::class, 'destroy']
)->name('training.destroy');

//schedule

Route::get(
    '/schedule',
    [ScheduleController::class, 'index']
)->name('schedule.index');

Route::get(
    '/create-schedule',
    [ScheduleController::class, 'create']
)->name('schedule.create');

Route::post(
    '/create-schedule',
    [ScheduleController::class, 'store']
)->name('schedule.store');

Route::get(
    '/edit-schedule/{id}',
    [ScheduleController::class, 'edit']
)->name('schedule.edit');

Route::put(
    '/edit-schedule/{id}',
    [ScheduleController::class, 'update']
)->name('schedule.update');

Route::delete(
    '/delete-schedule/{id}',
    [ScheduleController::class, 'destroy']
)->name('schedule.destroy');
