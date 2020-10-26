<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;

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
Route::get('/about', [PublicController::class,'about']);

Route::get('/contact', [PublicController::class,'contact']);
Route::post('/contact', [PublicController::class, 'contactPost']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
