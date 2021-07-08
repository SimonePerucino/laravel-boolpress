<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', "HomeController@index")->name("index");
Route::get('/posts', "PostController@index")->name("posts.index");


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("admin")
    ->namespace("Admin")
    ->middleware("auth")
    ->name("admin.")
    ->group(function(){
            Route::get("/", "HomeController@index")->name("home");
            // Route::get("/posts", "PostController@index")->name("home");
            Route::resource("/posts", "PostController");
    });

    Route::prefix("users")
    ->middleware("auth")
    ->group(function(){
            Route::get("/", "UserController@index")->name("home");
    });