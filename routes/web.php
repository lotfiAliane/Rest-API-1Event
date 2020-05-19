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

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/create','usersController@create');
Route::post('users','usersController@store');
Route::get('photo/create','photoController@create');
Route::post('photo','photoController@store');
Route::get('contact/create','contactController@create');
Route::post('contact','contactController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('films','FilmController');
Route::resource('customers','customerController');
Route::get('customers/{id}/update','customerController@update');


Route::post('/books', 'bookController@store');
Route::resource('books', 'bookController');