<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/animals', [AnimalController::class, 'index']);

Route::post('/animals', [AnimalController::class, 'store']);

Route::put('/animals/{id}', [AnimalController::class, 'update']);

Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);


// Students API
Route::get('/student', [StudentController::class, 'index'])->middleware('auth:sanctum');

Route::get('/student/{id}', [StudentController::class, 'index']);

Route::post('/student', [StudentController::class, 'store']);

Route::put('/student/{id}', [StudentController::class, 'update']);

Route::delete('/student/{id}', [StudentController::class, 'destroy']);


// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
