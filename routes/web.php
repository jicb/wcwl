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

Route::any('/test','PaytestController@test');
Route::any('/notify','PaytestController@notify');

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
    Route::any('logistics/createorder',['as'=>'createorder','uses'=>'LogisticsController@createOrder']);
    Route::any('logistics/ordertouser',['as'=>'ordertouser','uses'=>'LogisticsController@orderToUser']);
    //Route::any('logistics/useraddress',['as'=>'useraddress','uses'=>'LogisticsController@useraddress']);
    //Route::any('logistics/useraddressselect',['as'=>'useraddressselect','uses'=>'LogisticsController@useraddressselect']);
    Route::any('logistics/freightaging',['as'=>'freightaging','uses'=>'LogisticsController@freightaging']);
    Route::any('logistics/netquery',['as'=>'netquery','uses'=>'LogisticsController@netquery']);
    Route::any('logistics/takerange',['as'=>'takerange','uses'=>'LogisticsController@takerange']);

    Route::any('myself/myself',['as'=>'myself','uses'=>'MyselfController@myself']);
    Route::any('myself/commonaddress',['as'=>'commonaddress','uses'=>'MyselfController@commonaddress']);
    Route::any('myself/employee',['as'=>'employee','uses'=>'MyselfController@employee']);
    
    Route::any('myself/address',['as'=>'address','uses'=>'MyselfController@address']);
    Route::any('myself/address/create',['as'=>'address::create','uses'=>'MyselfController@addressCreate']);
    Route::any('myself/address/delete',['as'=>'address::delete','uses'=>'MyselfController@addressDelete']);
    Route::any('myself/address/totop',['as'=>'address::totop','uses'=>'MyselfController@addresstotop']);
    Route::any('myself/balance',['as'=>'balance','uses'=>'MyselfController@balance']);
    Route::any('myself/order',['as'=>'order','uses'=>'MyselfController@order']);
    Route::any('myself/getorder',['as'=>'getorder','uses'=>'MyselfController@getOrder']);
    Route::any('myself/quote',['as'=>'quote','uses'=>'MyselfController@quote']);
    Route::any('myself/ordersure',['as'=>'ordersure','uses'=>'MyselfController@ordersure']);
    Route::any('myself/numerical',['as'=>'numerical','uses'=>'MyselfController@numerical']);
    Route::any('myself/coupon',['as'=>'coupon','uses'=>'MyselfController@coupon']);

    Route::any('benefit/numericalmall',['as'=>'numericalmall','uses'=>'BenefitController@numericalmall']);
    Route::any('benefit/dolehall',['as'=>'dolehall','uses'=>'BenefitController@dolehall']);
});

Route::any('/testmysql','Wechat\H5\Auth\RegisterController@testmysql');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home/tables', 'HomeController@tables');

Route::get('/home/flot', 'HomeController@flot');
