<?php

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

Route::get('users', 'UserController@index')->name('users.index'); 
Route::get('users/{id}', 'UserController@show')->name('users.show'); 

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/create', 'PostController@create')->name('posts.create');
//testing
Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::put('posts/{id}', 'PostController@update')->name('posts.update');
//end testing
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{id}', 'PostController@show')->name('posts.show');
Route::delete('posts/{id}', 'PostController@destroy')->name('posts.destroy');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return "This is the home page";
});
Route::get('/home2', function () {
    return "This is the second home page";
});
Route::redirect('/home','home2',301);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
