<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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


Route::get('posts',[PostController::class, 'index'])->name('posts-home');
Route::post('posts/store',[PostController::class, 'store']);
Route::get('posts/create',[PostController::class, 'create'])->middleware('myauth')->name('posts-create');
Route::get('posts/show/{id}',[PostController::class, 'show']);
Route::get('posts/edit/{id}',[PostController::class, 'edit']);
Route::post('posts/update/{id}',[PostController::class, 'update']);
Route::delete('posts/destroy/{id}',[PostController::class, 'destroy']);


// Route::get('welcome' ,function(){
//     return view('welcome');
// });


// Route::redirect('/','posts');

Route::view('go','welcome');



Route::get('categories',[CategoryController::class, 'index']);
Route::post('categories/store',[CategoryController::class, 'store']);
Route::get('categories/create',[CategoryController::class, 'create']);
Route::post('categories/update/{id}',[CategoryController::class, 'update']);
Route::get('categories/edit/{id}',[CategoryController::class, 'edit']);
Route::delete('categories/destroy/{id}',[CategoryController::class, 'destroy']);


Route::get('register',[RegisterController::class, 'create']);
Route::post('register',[RegisterController::class, 'store']);


Route::get('login',[LoginController::class, 'create']);
Route::post('login',[LoginController::class, 'store']);

Route::get('logout',[LoginController::class, 'destroy']);

Route::get('my-posts',[MyPostController::class, 'index']);


