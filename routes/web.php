<?php

use App\Http\Controllers\PublicController;
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

//All routes defined 

Route::get('/', [PublicController::class, 'index']);
Route::get('/post/{id}', [PublicController::class,'singlePage']);
Route::get('/about',[PublicController::class,'about']);
Route::get('/contact',[PublicController::class,'contact']);


