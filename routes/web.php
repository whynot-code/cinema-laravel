<?php

use App\Http\Controllers\CategoryController;
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


Route::view('/', 'welcome');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories_create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories_store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories_edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories_update');
Route::delete('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories_destroy');

