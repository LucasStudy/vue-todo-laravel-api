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


Route::get('/index', 'TodoListController@index');
//Route::post('/store', 'TodoListController@store');
Route::match(["post", "options"], "/store", "TodoListController@store");
Route::match(["delete", "options"], "/destroy/{id}", "TodoListController@destroy");
Route::match(["post", "options"], "/update/{id}", "TodoListController@update");
Route::match(["put", "options"], "/doing/{id}", "TodoListController@doing");
Route::match(["put", "options"], "/done/{id}", "TodoListController@done");