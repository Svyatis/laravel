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

Route::get('/', 'ViewController@index');

Route::get('aboutUs', 'ViewController@aboutUs');
Route::get('upload', 'ViewController@upload');
Route::get('blog', 'ViewController@blog');
// Route::get('contactUs', 'HomeController@contactUs');

Route::get('contactUs',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contactUs',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);

Route::get('upload', function() {
    return View::make('test.upload');
});
Route::post('apply/upload', 'UploadController@upload');

Route::get('date', function()
{
    $date=date("d.m.y");
    $date2=date("d.m.y", strtotime("tomorrow"));
    return view('test.date',['today'=>$date,'tomorrow'=>$date2]);
});
Route::auth();

Route::get('/home', 'ViewController@blog');

Route::post('testing', 'UploadController@upload');
