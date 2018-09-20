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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/{id}', 'HomeController@user');


Route::group(['prefix' => 'atelier', 'middleware' => ['auth']], function () {
    Route::get('/index', 'Atelier\HomeController@index');
    Route::get('/user/details/{id}', 'Atelier\HomeController@details');

    Route::get('/project/list', 'Atelier\ProjectController@list');
    Route::get('/project/form/{id?}', 'Atelier\ProjectController@form');
    Route::post('/project/submit', 'Atelier\ProjectController@submit');
    Route::get('/project/details/{id}', 'Atelier\ProjectController@details');

    Route::get('/game/test/{id}', 'Atelier\GameController@test');
    Route::post('/game/submit', 'Atelier\GameController@submit');

    Route::group(['middleware' => ['isAdmin']], function () {
        Route::get('/user/list', 'Admin\HomeController@list');
        Route::post('/home/uploadCoverPhoto', 'Admin\HomeController@uploadCoverPhoto');
        Route::post('/home/editBasicProfile', 'Admin\HomeController@editBasicProfile');
    });
});

