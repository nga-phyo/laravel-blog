<?php

use App\Http\Controllers\CategoryController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\RegisterController;


// Route::get('home', function(){

//     return view('home');
// });
// Route::get('/', ['App\Http\Controllers\PostController','index']);

// Route::get('/', [PostController::class, 'index']);

// Route::resource('/posts', [PostController::class]);

    // Post Rote

    Route::get('posts', [PostController::class, 'index'])->middleware('myauth');
    Route::get('post/create', [PostController::class, 'create']);
    Route::post('post/store', [PostController::class, 'store']);
    Route::get('post/show/{id}', [PostController::class, 'show']);
    Route::get('post/edit/{id}', [PostController::class, 'edit']);
    Route::post('post/update/{id}', [PostController::class, 'update']);
    Route::delete('post/delete/{id}',[PostController::class, 'destroy']);


    // Register Login Logout

    Route::get('register',[RegisterController::class, 'create']);
    Route::post('register',[RegisterController::class, 'store']);

    Route::get('login',[LoginController::class, 'create']);
    Route::post('login',[LoginController::class, 'store']);
    
    Route::get('logout',[LoginController::class, 'destroy']);



    // Route::get('test',function(){

    //     Post::factory(3)->create();
    // });

    Route::get('cat',[CategoryController::class , 'index']);
    Route::get('cat/create',[CategoryController::class , 'create']);
    Route::post('cat/store',[CategoryController::class , 'store']);
    Route::post('cat/delete/{id}',[CategoryController::class , 'destroy']);
    Route::get('cat/edit/{id}',[CategoryController::class , 'edit']);
    Route::post('cat/update/{id}',[CategoryController::class , 'update']);



    Route::get('my-post', [MyPostController::class, 'index']);