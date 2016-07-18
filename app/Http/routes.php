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

    Route::auth();
    Route::get('/', 'HomeWorkController@mainpage');
    Route::get('aboutUs', 'HomeWorkController@aboutUs');
    Route::get('upload', 'HomeWorkController@uploadMake');
    Route::get('blog', ['as' => 'blog', 'uses' => 'HomeWorkController@getBlog']);
    Route::get('contactUs', ['as' => 'contact', 'uses' => 'HomeWorkController@create']);
    Route::get('deletePost/{postId}', ['as' => 'deletePost', 'uses' => 'HomeWorkController@postDelete']);
    // Forms
    Route::post('apply/upload', 'HomeWorkController@upload');
    Route::post('blog', ['as' => 'add_new_post', 'uses' => 'HomeWorkController@postAdd']);
    Route::post('contactUs', ['as' => 'contact_store', 'uses' => 'HomeWorkController@store']);

});

    Route::get('welcome/{locale}', function ($locale) {
        App::setLocale($locale);

        echo trans('auth.failed');
    });