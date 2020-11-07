<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;


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
Route::get('post/{post}', [PublicController::class,'singlePost'])->name('singlePost');
Route::get('/about', [PublicController::class,'about'])->name('about');

Route::get('/contact', [PublicController::class,'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactPost'])->name('contactPost');



Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::prefix('user')->group(function() {
    Route::post('new-comment',[UserController::class,'newComment'])->name('newComment');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('userDashboard');
    Route::get('comments', [UserController::class,'comments'])->name('userComments');
    Route::post('comment/{id/delete}', [UserController::class,'deleteComment'])->name('deleteComment');
    Route::get('profile', [UserController::class,'profile'])->name('userProfile');
    Route::post('profile', [UserController::class, 'profilePost'])->name('userprofilePost');
});

Route::prefix('author')->group(function() {
    Route::get('dashboard', [AuthorController::class, 'dashboard'])->name('authorDashboard');
    Route::get('posts', [AuthorController::class, 'posts'])->name('authorPosts');
    Route::get('posts/new',[AuthorController::class, 'newPost'])->name('newPost');
    Route::post('posts/new', [AuthorController::class, 'createPost'])->name('createPost');
    Route::get('posts/{id}/new', [AuthorController::class, 'postEdit'])->name('postEdit');
    Route::post('posts/{id}/new', [AuthorController::class, 'postEditPost'])->name('postEditPost');
    Route::post('posts/{id}/delete', [AuthorController::class, 'deletePost'])->name('deletePost');
    Route::get('comments', [AuthorController::class,'comments'])->name('authorComments');
});

Route::prefix('admin')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('posts', [AdminController::class, 'posts'])->name('adminPosts');
    Route::get('posts/{id}/new', [AdminController::class, 'postEdit'])->name('adminPostEdit');
    Route::post('posts/{id}/new', [AdminController::class, 'postEditPost'])->name('adminPostEditPost');
    Route::post('posts/{id}/delete', [AdminController::class, 'deletePost'])->name('adminDeletePost');
    Route::get('comments', [AdminController::class, 'comments'])->name('adminComments');
    Route::post('comment/{id}/delete', [AdminController::class,'deleteComment'])->name('adminDeleteComment');
    Route::get('users', [AdminController::class, 'users'])->name('adminUsers');
    Route::get('user/{id}/edit', [AdminController::class, 'editUser'])->name('adminEditUser');
    Route::post('user/{id}/edit', [AdminController::class, 'editUserPost'])->name('adminEditUserPost');
    Route::post('user/{id}/delete', [AdminController::class, 'deleteUser'])->name('adminDeleteUser');

    //admin products 
    Route::get('products', [AdminController::class, 'products'])->name('adminProducts');

    Route::get('products/new', [AdminController::class, 'newProduct'])->name('adminNewProduct');
    Route::post('products/new', [AdminController::class, 'newProductPost'])->name('adminNewProduct');

    Route::get('product/{id}', [AdminController::class, 'EditProduct'])->name('adminEditProduct');
    Route::post('product/{id}', [AdminController::class, 'EditProductPost'])->name('adminEditProduct');

    Route::post('product/{id}/delete', [AdminController::class, 'deleteProduct'])->name('adminDeleteProduct');


});

Route::prefix('shop')->group(function() {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('product/{id}', [ShopController::class, 'singleProduct'])->name('shop.singleProduct');
    Route::get('product/{id}/order', [ShopController::class, 'orderProduct'])->name('shop.orderProduct');
});