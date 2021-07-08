<?php

use App\Http\Controllers\PageController;
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

//------------>>>> Route::get('/', 'PageController@index'); //DOBBIAMO SISTEMARLO!
//non è necessario creare un PageController, potevamo benissimo fare così:
/* Route::get('/', function () {
        return view('guest.home');
} */

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::resource('/posts', 'PostController');
    });

Route::get('{any?}', 'PageController@index')->where('any','.*');