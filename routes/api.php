<?php

use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\AuthController;
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


Route::controller(TravelController::class)->prefix('v1')->group(function() {
    Route::get('/travels', 'index');
    Route::middleware(['auth:sanctum', 'role:admin'])->post('/travels', 'store');
});

Route::controller(TourController::class)->prefix('v1')->group(function() {
    Route::get('/travels/{travel:slug}/tours', 'index');
    Route::middleware(['auth:sanctum', 'role:admin'])->post('/travels/{travel}/tours', 'store');
});

Route::controller(AuthController::class)->prefix('v1')->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});