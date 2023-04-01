<?php

use App\Http\Controllers\Auth\AuthController;
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
 *  GROUP_ADMIN
*/
Route::group(['middleware' => ['authorization', 'admin']], function () {
    Route::get('/logout', [AuthController::class, 'logOut']);
});

/**
 *  GROUP_WAITER
 */
Route::group(['middleware' => ['authorization', 'waiter']], function () {
    Route::get('/logout', [AuthController::class, 'logOut']);
});

/**
 *  GROUP_COOK
 */
Route::group(['middleware' => ['authorization', 'cook']], function () {
    Route::get('/logout', [AuthController::class, 'logOut']);
});
