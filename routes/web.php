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

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/post/{id}', [PublicController::class,'singlePage'])->name('singlePage');
Route::get('/about', [PublicController::class,'about'])->name('about');

Route::get('/contact', [PublicController::class,'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactPost'])->name('contactPost');



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
