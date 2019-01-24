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

function restApiCrudRoutes (string $controllerName) {
    return function () use ($controllerName) {
        Route::get('', $controllerName.'@get');
        Route::get('/{id}', $controllerName.'@getById');
        Route::delete('/{id}', $controllerName.'@delete');
        Route::put('/{id}', $controllerName.'@update');
        Route::post('', $controllerName.'@create');
    };
}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'sections','middleware' => 'auth:api'], restApiCrudRoutes('SectionsController'));

Route::group(['prefix' => 'roles','middleware' => 'auth:api'], restApiCrudRoutes('RolesController'));
Route::post('roles/attachScope', 'RolesController@attachScope')->middleware('auth:api');
Route::post('roles/detachScope', 'RolesController@detachScope')->middleware('auth:api');

Route::group(['prefix' => 'scopes','middleware' => 'auth:api'], restApiCrudRoutes('ScopesController'));


Route::group(['prefix' => 'user'], function() {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::post('details', 'UserController@details')->middleware('auth:api');
    Route::post('attachRole', 'UserController@attachRole')->middleware('auth:api');
    Route::post('detachRole', 'UserController@detachRole')->middleware('auth:api');
    Route::post('attachScope', 'UserController@attachScope')->middleware('auth:api');
    Route::post('detachScope', 'UserController@detachScope')->middleware('auth:api');
});
