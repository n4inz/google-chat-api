<?php

use App\Http\Controllers\api\admin\BoardController;
use App\Http\Controllers\api\Categorys;
use App\Http\Controllers\api\CreateTask;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\Users;
use App\Http\Controllers\api\auth\GoogleLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Chat bot

Route::post('/webhook' , [TestController::class , 'index']);
Route::post('/categorys' , [Categorys::class , 'index']);
Route::post('/task' , [CreateTask::class , 'index']);
Route::post('/create-category' , [CreateTask::class , 'category']);
Route::post('/priority' , [CreateTask::class , 'priority']);
Route::post('/choese-status' , [CreateTask::class , 'choeseStatus']);

Route::get('/users' , [Users::class , 'index']);
Route::get('/categorys' , [Categorys::class , 'index']);
Route::get('/category_owners' , [Users::class , 'owners']);
Route::get('/category_owner/{id}' , [Users::class , 'show']);
Route::post('/save-owner' , [Users::class , 'store']);
Route::delete('/delete/{id}' , [Users::class , 'delete']);
Route::put('/edit/{id}' , [Users::class , 'update']);
// Route::middleware('auth:sanctum')->get('/board' , [BoardController::class, 'index']);



Route::post('/auth/token', [GoogleLoginController::class, 'generateToken']);
Route::post('/auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);






