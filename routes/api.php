<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\WorkShift\WorkShiftController;
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

Route::post('/login', [AuthController::class, 'logIn']);

/**
 *  GROUP_AUTH
 */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logOut']);
});

/**
 *  GROUP_ADMIN_AUTH
*/
Route::group(['middleware' => ['admin', 'auth:sanctum']], function () {
    // Операции_сотрудники
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/user/{id}/to-dismiss', [UserController::class, 'destroy']);
    // Операции_смены
    Route::post('/work-shift', [WorkShiftController::class, 'store']);
    Route::get('/work-shift/{id}/open', [WorkShiftController::class, 'open']);
});

/**
 *  GROUP_WAITER_AUTH
 */
Route::group(['middleware' => ['waiter', 'auth:sanctum']], function () {
});

/**
 *  GROUP_COOK_AUTH
 */
Route::group(['middleware' => ['cook', 'auth:sanctum']], function () {
});
