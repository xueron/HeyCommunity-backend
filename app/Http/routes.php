<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//
// Api
// ----------------------------
Route::group(['middleware' => [], 'prefix' => 'api'], function() {
    Route::get('/', function() {
        return view('api.index');
    });
    Route::controller('timeline', 'Api\TimelineController');
    Route::controller('activity', 'Api\ActivityController');
    Route::controller('topic',    'Api\TopicController');
    Route::controller('notice',   'Api\NoticeController');
    Route::controller('talk',     'Api\TalkController');
    Route::controller('system',   'Api\SystemController');

    Route::controller('wechat', 'Api\WeChatController');

    Route::controller('user', 'Api\UserController');
});



//
// Base and Admin
// ----------------------------
Route::group([], function() {
    // Admin dashboard
    // ----------------------------
    Route::get('admin/login', ['as' => 'admin.auth.login', 'uses' => 'Admin\AuthController@getLogin']);
    Route::post('admin/login', ['as' => 'admin.auth.loginHandle', 'uses' => 'Admin\AuthController@postLogin']);
    Route::any('admin/logout', ['as' => 'admin.auth.logout', 'uses' => 'Admin\AuthController@anyLogout']);

    Route::group(['prefix' => 'admin', 'middleware' => ['auth.userAdmin']], function() {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\HomeController@index']);

        Route::resource('timeline', 'Admin\TimelineController');
        Route::resource('activity', 'Admin\ActivityController');
        Route::resource('topic',    'Admin\TopicController');
        Route::controller('system', 'Admin\SystemController');
    });

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::controller('system', 'SystemController');
});
