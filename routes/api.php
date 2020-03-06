<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){

  Route::apiResource('films','FilmController');

});
Route::resource('Ateliers','Api\AtelierController');

Route::post('login', 'Api\UserController@login');
  Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', 'Api\UserController@details');

Route::resource('products','Api\ProductController');

Route::resource('Participants','Api\ParticipantController');

Route::post('Participant/inscription/{id}','Api\ParticipantController@subscription');

});
