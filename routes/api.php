<?php

use App\Http\Controllers\Api\ConfirmReservationApiController;
use App\Http\Controllers\Api\RegisterApiController;
use App\Http\Controllers\Api\ReservationApiController;
use App\Http\Controllers\AuthController;
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

Route::post('/registeruser', [RegisterApiController::class, 'store'])->name('register_user_api');
Route::post('/confirmreservation', [ConfirmReservationApiController::class, 'store'])->name('reservation_confirm_api');
Route::post('/storereservation', [ReservationApiController::class, 'store'])->name('reservation_store_api');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth_user'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->name('authenticate');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});