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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'MainController@index');
});
Route::post('/test_middleware', 'MainController@show');



//index
// Route::get('/','HomeController@indexPage');

Auth::routes();
