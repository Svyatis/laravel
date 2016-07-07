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

Route::get('/', 'HomeController@index');

Route::get('aboutUs', 'HomeController@aboutUs');
Route::get('upload', 'HomeController@upload');
Route::get('blog', 'HomeController@blog');
Route::get('contactUs', 'HomeController@contactUs');


Route::get('date', function()
{
    $date=date("d.m.y");
    $date2=date("d.m.y", strtotime("tomorrow"));
    return view('test.date',['today'=>$date,'tomorrow'=>$date2]);
});