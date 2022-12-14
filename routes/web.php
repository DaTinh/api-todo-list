<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Todo;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [Todo::class, 'index' ]);

Route::resource('category', CategoryController::class);
