<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('authors', AuthorController::class);
// Route::get('comments/{id}', 'CommentController@mycreate');
Route::post('comments/{id}', 'CommentController@mycreate')->name('mycreate');
