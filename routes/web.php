<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PostController;
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

// Home
Route::get('/', function () {
    return view('home');
});

// Clubs
Route::resource('clubs', ClubController::class);

// Training
Route::resource('trainings', TrainingController::class);

// Booking
Route::resource('bookings', BookingController::class);

// Training
/*Route::get(
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
)->name('training.destroy');*/

// Schedule
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

// Posts (formulaire de contact)
Route::get('/#form-contact', [PostController::class, 'create'])->name('post.create');
Route::post('/', [PostController::class, 'store'])->name('post.store');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

// Pictures
Route::get(
    '/pictures',
    [PictureController::class, 'index']
)->name('pictures.index');

Route::get(
    '/pictures-create',
    [PictureController::class, 'create']
)->name('pictures.create');

Route::post(
    '/pictures-create',
    [PictureController::class, 'store']
)->name('pictures.store');

Route::delete(
    '/pictures-destroy/{id}',
    [PictureController::class, 'destroy']
)->name('pictures.destroy');
