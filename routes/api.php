<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/patients', [PatientsController::class, 'index'])->middleware('auth:sanctum');
Route::post('/patients', [PatientsController::class, 'store'])->middleware('auth:sanctum');
Route::put('/patients/{id}', [PatientsController::class,'update'])->middleware('auth:sanctum');
Route::delete('/patients/{id}',[PatientsController::class,'destroy'])->middleware('auth:sanctum');
Route::get('/patients/{id}', [PatientsController::class, 'show'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
