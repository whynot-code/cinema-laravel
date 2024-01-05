<?php

use App\Http\Controllers\Api\CategoryApiController;
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

Route::get('/categories', [CategoryApiController::class, 'index'])->name('categories_api');
Route::get('/categories/{id}', [CategoryApiController::class, 'show'])->name('categories_show_api');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('login', [AuthController::class, 'login'])->name('authenticate');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});