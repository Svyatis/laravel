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
    Route::get('language', ['as' => 'language-chooser', 'uses' => 'HomeWorkController@setLocale']);
    Route::get('/', 'HomeWorkController@mainpage');
    Route::get('aboutUs', 'HomeWorkController@aboutUs');
    Route::get('catalog', 'HomeWorkController@getAllProducts');
    Route::post('search', 'HomeWorkController@searchBy');
    Route::get('products/{id}', ['as' => 'products', 'uses' => 'HomeWorkController@getProductDetail']);
    Route::get('blog', ['as' => 'blog', 'uses' => 'HomeWorkController@getBlog']);
    Route::get('deletePost/{postId}', ['as' => 'deletePost', 'uses' => 'HomeWorkController@postDelete']);
    Route::get('contactUs', ['as' => 'contact', 'uses' => 'HomeWorkController@contactUs']);

    // Forms
    Route::post('upload', 'HomeWorkController@upload');
    Route::post('blog', ['as' => 'add_new_post', 'uses' => 'HomeWorkController@postAdd']);
    Route::post('contactUs', ['as' => 'contact_store', 'uses' => 'HomeWorkController@store']);

});
git