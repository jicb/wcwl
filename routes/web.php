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

Route::group(['as'=>'wechat::','prefix'=>'wechat','namespace'=>'Wechat'],function(){
    Route::any('/',['as'=>'serve','uses'=>'WechatController@serve']);
    Route::any('/register/{openid}',['as'=>'register','uses'=>'WechatController@registeruser']);
    Route::any('/menuadd',['as'=>'menuadd','uses'=>'WechatController@menuadd']);   
});

Route::group(['as'=>'user::','prefix'=>'wechat/user','namespace'=>'Wechat\User'],function(){
    Route::any('/adduser',['as'=>'adduser','uses'=>'UserController@adduser']);
    Route::any('/create',['as'=>'create','uses'=>'UserController@create']);
});

Route::group(['as'=>'h5::','prefix'=>'h5/auth','namespace'=>'Wechat\H5\Auth'],function(){
    Route::any('/register/{openid}',['as'=>'register','uses'=>'RegisterController@registeruser']);
    Route::get('/validate',['as'=>'validate','uses'=>'RegisterController@validatecode']);
    Route::any('/registersend',['as'=>'registersend','uses'=>'RegisterController@regsend']);
    Route::any('/returnregistered',['as'=>'registered','uses'=>'RegisterController@registered']);
});

Route::group(['as'=>'button::','prefix'=>'button','namespace'=>'Wechat\Button'],function(){
    Route::any('logistics/delivery',['as'=>'delivery','uses'=>'LogisticsController@delivery']);
    Route::any('logistics/useraddress',['as'=>'useraddress','uses'=>'LogisticsController@useraddress']);
    Route::any('logistics/senduseraddress',['as'=>'senduseraddress','uses'=>'LogisticsController@senduseraddress']);
});

Route::any('/testmysql','Wechat\H5\Auth\RegisterController@testmysql');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home/tables', 'HomeController@tables');

Route::get('/home/flot', 'HomeController@flot');
