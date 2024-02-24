<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;
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

// Route to register a new user
Route::post('/auth/register', [UserController::class, 'createuser']);

// Route to log in an existing user
Route::post('/auth/login', [UserController::class, 'loginuser']);


// Add new details
Route::post('/add', [DashboardController::class, 'add']);

// Get all details
Route::get('/details', [DashboardController::class, 'getDetails']);

// Get a specific detail by ID
Route::get('/details/{id}', [DashboardController::class, 'getDetailById']);

// Update a detail
Route::put('/details/{id}', [DashboardController::class, 'updateDetail']);

// Delete a detail
Route::delete('/details/{id}', [DashboardController::class, 'destroyDetail']);

