<?php

use App\Http\Controllers\API\TodoController;
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
Route::get('/index', [TodoController::class, 'index']);
Route::post('/add', [TodoController::class, 'add']);
Route::post('/delete', [TodoController::class, 'destroy']);
Route::post('/delete-all', [TodoController::class, 'deleteAll']);
Route::post('/done-all', [TodoController::class, 'doneAll']);
