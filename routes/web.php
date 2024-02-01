<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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

// https://laravel.com/docs/10.x/middleware
// AdminMiddleware
/*Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
})->middleware(AdminMiddleware::class);*/

// Home
Route::get('/', function () {
    return view('home');
});

// Clubs
Route::resource('clubs', ClubController::class);

// Trainings
Route::resource('trainings', TrainingController::class);

// Schedules
Route::resource('schedules', ScheduleController::class);

// Bookings
Route::resource('bookings', BookingController::class);

// Pictures
Route::resource('pictures', PictureController::class);

// Posts (formulaire de contact)
Route::get('/#form-contact', [PostController::class, 'create'])->name('posts.create');
Route::post('/', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Users
Route::resource('users', UserController::class);

// Login
Route::post('/login', [LoginController::class, 'login'])->name('users.login');

