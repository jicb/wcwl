<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/hello','HelloController@hello');

Route::any('/wechat','Wechat\WechatController@serve')->name('wechat');

Auth::routes();

Route::get('/home', 'HomeController@index');
