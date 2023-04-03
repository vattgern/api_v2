<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\WorkShift\ShiftController;
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
Route::group(['middleware' => ['auth:sanctum', 'admin']], function () {
    // Операции_сотрудники
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::get('/user/{id}/to-dismiss', [UserController::class, 'destroy']);
    // Операции_смены
    Route::post('/work-shift', [ShiftController::class, 'store']);
    Route::get('/work-shift/{id}/open', [ShiftController::class, 'open']);
    Route::get('/work-shift/{id}/close', [ShiftController::class, 'close']);
    Route::get('/work-shift', [ShiftController::class, 'index']);
    Route::post('/work-shift/{id}/user', [ShiftController::class, 'add']);
    Route::delete('/work-shift/{id}/user/{user_id}', [ShiftController::class, 'delete']);
    // Операции_заказы
    Route::get('/work-shift/{id}/order', [ShiftController::class, 'orders']);
});

/**
 *  GROUP_WAITER_AUTH
 */
Route::group(['middleware' => ['auth:sanctum', 'waiter']], function () {
});

/**
 *  GROUP_COOK_AUTH
 */
Route::group(['middleware' => ['auth:sanctum', 'cook']], function () {
});
