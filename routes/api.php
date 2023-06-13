<?php

use App\Http\Controllers\Api\CatsController;
use App\Http\Controllers\Api\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SheltersController;

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

Route::resource('shelters', SheltersController::class);
Route::resource('cats', CatsController::class);
Route::resource('employees', EmployeesController::class);
