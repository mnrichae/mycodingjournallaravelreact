<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ThoughtController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//tasks
ROUTE::post('/addtask', [TaskController::class, 'create']); 
ROUTE::get('/tasks',[TaskController::class,'index']);
ROUTE::delete('/deletetask/{id}',[TaskController::class,'delete']);
ROUTE::get('/edittask/{id}',[TaskController::class,'edit']);
ROUTE::put('/updatetask/{id}',[TaskController::class,'update']);

//thoughts
ROUTE::post('/addthought', [ThoughtController::class, 'create']); 
ROUTE::get('/thoughts',[ThoughtController::class,'index']);
ROUTE::delete('/deletethought/{id}',[ThoughtController::class,'delete']);
ROUTE::get('/editthought/{id}',[ThoughtController::class,'edit']);
ROUTE::put('/updatethought/{id}',[ThoughtController::class,'update']);
