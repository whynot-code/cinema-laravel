<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RepertoiresController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $category = Category::first();

//     return dd([
//         'category' => $category->name,
//         'movies' => $category->movies()->get()
//     ]);
// });


Route::view('/', 'welcome')->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories_create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories_store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories_edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories_update');
Route::delete('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories_destroy');

Route::get('/movies', [MovieController::class, 'index'])->name('movies_index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies_create');
Route::post('/movies/store', [MovieController::class, 'store'])->name('movies_store');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies_edit');
Route::put('/movies/{id}/update', [MovieController::class, 'update'])->name('movies_update');
Route::delete('/movies/{id}/destroy', [MovieController::class, 'destroy'])->name('movies_destroy');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms_index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms_create');
Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms_store');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms_edit');
Route::put('/rooms/{id}/update', [RoomController::class, 'update'])->name('rooms_update');
Route::delete('/rooms/{id}/destroy', [RoomController::class, 'destroy'])->name('rooms_destroy');

Route::get('/repertoires', [RepertoiresController::class, 'index'])->name('repertoires_index');
Route::get('/repertoires/create', [RepertoiresController::class, 'create'])->name('repertoires_create');
Route::post('/repertoires/store', [RepertoiresController::class, 'store'])->name('repertoires_store');
Route::get('/repertoires/{id}/edit', [RepertoiresController::class, 'edit'])->name('repertoires_edit');
Route::put('/repertoires/{id}/update', [RepertoiresController::class, 'update'])->name('repertoires_update');
Route::delete('/repertoires/{id}/destroy', [RepertoiresController::class, 'destroy'])->name('repertoires_destroy');

Route::get('/login', [AuthLoginController::class, 'login'])->name('login');
Route::get('/login/store', [AuthLoginController::class, 'storeUser']);
Route::get('/login/authenticate', [AuthLoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');


