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

Route::group(['prefix' => 'sections'], restApiCrudRoutes('SectionsController'));