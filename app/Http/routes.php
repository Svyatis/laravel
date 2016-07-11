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
// ViewController
Route::get('/', 'ViewController@index');
Route::get('aboutUs', 'ViewController@aboutUs');
Route::get('blog', 'ViewController@blog');

// Contact Form
Route::get('contactUs',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contactUs',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);

// Upload Form
Route::get('upload', function() {
    return View::make('Upload.upload');
});
Route::post('apply/upload', 'UploadController@upload');

// Authentication
Route::auth();
Route::get('/home', 'ViewController@blog');
