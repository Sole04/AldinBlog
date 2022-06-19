<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
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



Auth::routes();

Route::get("/","App\Http\Controllers\PostController@index");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/myposts',"App\Http\Controllers\PostController@myPosts");

Route::get('/posts/user/{id}',"App\Http\Controllers\PostController@userPosts");

Route::get('user/myprofile',"App\Http\Controllers\PostController@myProfile");

Route::put('users/{id}/updateprofile',"App\Http\Controllers\HomeController@profileupdate");

Route::get('posts/all',"App\Http\Controllers\PostController@allposts");

Route::get('users/all',"App\Http\Controllers\PostController@allusers");

Route::delete('user/delete/{id}',"App\Http\Controllers\HomeController@destroy");



Route::resource('posts',PostController::class);
