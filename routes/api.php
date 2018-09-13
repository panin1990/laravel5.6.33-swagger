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

Route::group(['prefix' => 'sections'], function(){
    Route::get('', 'SectionsController@get');
    Route::get('/{id}', 'SectionsController@getById');
    Route::delete('/{id}','SectionsController@delete');
    Route::put('/{id}','SectionsController@update');
    Route::post('','SectionsController@create');
});