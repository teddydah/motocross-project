<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Redirect;
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
})->name('home');

Route::get('/', [HomeController::class, 'main'])->name('home');

// Clubs
Route::resource('clubs', ClubController::class);
Route::get('/clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit')->middleware('admin');
Route::put('/clubs/{club}', [ClubController::class, 'update'])->name('clubs.update')->middleware('admin');


// Trainings
Route::resource('trainings', TrainingController::class);
Route::get('/trainings/{training}/edit', [TrainingController::class, 'edit'])->name('trainings.edit')->middleware('admin');
Route::put('/trainings/{training}', [TrainingController::class, 'update'])->name('trainings.update')->middleware('admin');

// Schedules
Route::resource('schedules', ScheduleController::class);
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit')->middleware('admin');
Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update')->middleware('admin');

// Bookings
Route::resource('bookings', BookingController::class);
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit')->middleware('admin');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update')->middleware('admin');


// Pictures
Route::resource('pictures', PictureController::class);

// Posts (formulaire de contact)
Route::get('/#form-contact', [PostController::class, 'create'])->name('posts.create');
Route::post('/', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('admin');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('admin');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Logout
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('users.logout');
