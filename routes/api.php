<?php

use App\Http\Controllers\api\admin\BoardController;
use App\Http\Controllers\api\Categorys;
use App\Http\Controllers\api\CreateTask;
use App\Http\Controllers\api\TestController;
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


// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/board' , [BoardController::class, 'index']);
});


