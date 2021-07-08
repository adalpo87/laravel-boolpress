<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api') //n.b. namespace mi indica dove la route deve puntare
    ->name('api.') //se mettiamo name poi qui sotto in route::get e name posso evitare di scrivere api.posts
    ->group(function(){
        Route::get('posts', 'PostController@index')->name('posts');
    });