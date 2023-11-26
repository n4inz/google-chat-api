<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// USER
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

// CATEGORY
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/add', [CategoryController::class, 'create'])->name('category.add');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');