<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;


Route::get('/{lang}',function($lang)
{
  app()->setLocale($lang);
  return view('welcome');
});

Route::get('mail/sent',function(){

  Mail::raw('Mail Body Testing First Time',function($m){
    
    $m->to('thetminnhtun92@gmail.com')
    ->subject('Hello World');
  });

  return 'mail send success';
});




Route::get('collection', function(){

  $name = collect([0,2,4,6]);

  dd($name->sortDesc()->toArray());
});

// Route::get('file/create', function(){

//   return Storage::disk('public')->put('my_dir/a.txt','apple');
// });


// Route::get('file/read', function(){
//     return Storage::disk('public')->get('my_dir/a.txt');
// });


// Route::get('file/delete', function(){
//     return Storage::disk('public')->delete('my_dir/a.txt');
// });
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


Route::get('posts',[PostController::class, 'index'])->name('posts.home');
Route::post('posts/store',[PostController::class, 'store'])->name('posts.store');
Route::get('posts/create',[PostController::class, 'create'])->middleware('myauth')->name('posts.create');
Route::get('posts/show/{id}',[PostController::class, 'show']);
Route::get('posts/edit/{id}',[PostController::class, 'edit']);
Route::post('posts/update/{id}',[PostController::class, 'update']);
Route::delete('posts/destroy/{id}',[PostController::class, 'destroy']);


// Route::get('welcome' ,function(){
//     return view('welcome');
// });


// Route::redirect('/','posts');

Route::view('go','welcome');



Route::get('categories',[CategoryController::class, 'index'])->name('categories.home');
Route::post('categories/store',[CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/create',[CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/update/{id}',[CategoryController::class, 'update'])->name('categories.update');
Route::get('categories/edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('categories/destroy/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('register',[RegisterController::class, 'create']);
Route::post('register',[RegisterController::class, 'store']);


Route::get('login',[LoginController::class, 'create']);
Route::post('login',[LoginController::class, 'store']);

Route::get('logout',[LoginController::class, 'destroy']);

Route::get('my-posts',[MyPostController::class, 'index']);


