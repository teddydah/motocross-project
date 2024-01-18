<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(
    '/users/all',
    [UserController::class, 'index']
)->name('user.all');

Route::get(
    '/users/{id}',
    [UserController::class, 'show']
)->name('user.show');

Route::post(
    '/users',
    [UserController::class, 'store']
)->name('user.store');

Route::delete(
    '/users/{id}',
    [UserController::class, 'destroy']
)->name('user.destroy');

Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('user.login');
