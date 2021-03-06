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

Route::get('/test', 'HomeController@test');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/user/{id}', 'HomeController@user');
Route::get('/exchange', 'HomeController@exchange');
Route::get('/exchangeCalculate', 'HomeController@exchangeCalculate');


Route::group(['prefix' => 'atelier', 'middleware' => ['auth']], function () {
    Route::get('/index', 'Atelier\HomeController@index');
    Route::get('/user/details/{id}', 'Atelier\HomeController@details');
    
    Route::group(['middleware' => ['checkOut']], function() {
        Route::get('/clock/checkInView', 'Atelier\ClockController@checkInView');
        Route::post('/clock/checkIn', 'Atelier\ClockController@checkIn');
        Route::get('/clock/checkOutSuccess', 'Atelier\ClockController@checkOutSuccess');
    });
    Route::group(['middleware' => ['checkIn']], function() {
        Route::get('/clock/checkInSuccess', 'Atelier\ClockController@checkInSuccess');
        Route::get('/clock/checkOutView', 'Atelier\ClockController@checkOutView');
        Route::post('/clock/checkOut', 'Atelier\ClockController@checkOut');

        Route::get('/project/list', 'Atelier\ProjectController@list');
        Route::get('/project/form/{id?}', 'Atelier\ProjectController@form');
        Route::post('/project/submit', 'Atelier\ProjectController@submit');
        Route::get('/project/details/{id}', 'Atelier\ProjectController@details');
        Route::get('/project/tasks/{projectId}', 'Atelier\ProjectController@tasks');
        Route::get('/project/taskForm/{projectId}/{taskId?}', 'Atelier\ProjectController@taskForm');
        Route::post('/project/submitTask/', 'Atelier\ProjectController@submitTask');
        Route::get('/project/task/{id}', 'Atelier\ProjectController@task');
        Route::post('/project/changeTaskStatus', 'Atelier\ProjectController@changeTaskStatus');
        Route::post('/project/changeStartDate', 'Atelier\ProjectController@changeStartDate');
        Route::post('/project/deleteTask', 'Atelier\ProjectController@deleteTask');
    });

    Route::get('/game/cards', 'Atelier\GameController@cards');
    Route::get('/game/form/{id?}', 'Atelier\GameController@form');
    Route::post('/game/submit', 'Atelier\GameController@submit');
    Route::get('/game/lottery/{id}', 'Atelier\GameController@lottery');
    Route::post('/game/submitLottery', 'Atelier\GameController@submitLottery');
    Route::get('/game/timer', 'Atelier\GameController@timer');

    Route::group(['middleware' => ['isAdmin']], function () {
        Route::get('/user/list', 'Admin\HomeController@list');
        Route::post('/home/uploadCoverPhoto', 'Admin\HomeController@uploadCoverPhoto');
        Route::post('/home/editBasicProfile', 'Admin\HomeController@editBasicProfile');
    });
});

Route::get('/wechat/index', 'WeChatController@index');

