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

Route::get('/{user_id?}', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout');

    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('/index', 'Admin\IndexController@index');
    Route::get('/image/list', 'Admin\ImageController@list');

    Route::get('/home/list', 'Admin\HomeController@list');
    Route::get('/home/details/{id}', 'Admin\HomeController@details');
    Route::post('/home/uploadCoverPhoto', 'Admin\HomeController@uploadCoverPhoto');
    Route::post('/home/editBasicProfile', 'Admin\HomeController@editBasicProfile');
});

