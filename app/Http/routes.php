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

// Apply Middleware
Route::group(['middlewareGroups' => ['web']], function () {
    // ViewController...
    Route::get('/', 'HomeWorkController@mainpage');
    Route::get('aboutUs', 'HomeWorkController@aboutUs');
    Route::get('blog', 'HomeWorkController@blog');

    // Contact Form
    Route::get('contactUs', ['as' => 'contact', 'uses' => 'HomeWorkController@create']);
    Route::post('contactUs', ['as' => 'contact_store', 'uses' => 'HomeWorkController@store']);

    // Upload Form
    Route::get('upload', 'HomeWorkController@uploadMake');
    Route::post('apply/upload', 'HomeWorkController@upload');
    
    // Authentication
    Route::auth();
    Route::get('/home', 'HomeWorkController@index');
});